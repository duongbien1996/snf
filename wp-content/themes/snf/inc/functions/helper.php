<?php

/**
 * phân trang
 *
 * @author hien-tech (hiennd@ancu.com)
 * @since 2019-06-15
 */
if (!function_exists('vnb_pagination')) {
    function vnb_pagination()
    {
        global $wp_query;

        /** Stop execution if there's only 1 page */
        if($wp_query->max_num_pages <= 1)
            return;

        $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
        $max   = intval($wp_query->max_num_pages);

        /** Add current page to the array */
        if ($paged >= 1)
            $links[] = $paged;

        /** Add the pages around the current page to the array */
        if ($paged >= 3) {
            $links[] = $paged - 1;
            $links[] = $paged - 2;
        }

        if (($paged + 2) <= $max) {
            $links[] = $paged + 2;
            $links[] = $paged + 1;
        }   

        echo '<div class="dataTables_paginate paging_simple_numbers"><ul class="pagination">'."\n";

        /** Previous Post Link */
        if (get_previous_posts_link())
            printf('<li class="btn-prev">%s</li>' . "\n", get_previous_posts_link("<span class=\"icon-option-arrow-left --arrow\"></span>"));

        /** Link to first page, plus ellipses if necessary */
        if (!in_array(1, $links)) {
            $class = 1 == $paged ? ' class="active-page"' : '';

            printf('<li><a %s href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

            if (!in_array(2, $links))
                echo '<li class="dots_pagination">...</li>';
        }

        /** Link to current page, plus 2 pages in either direction if necessary */
        sort($links);
        foreach ((array) $links as $link) {
            $class = $paged == $link ? ' class="active-page"' : '';
            if ($paged == $link) {
                printf('<li class="active"><a %s href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
            } else {
                printf('<li><a %s href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
            }
        }

        /** Link to last page, plus ellipses if necessary */
        if (! in_array($max, $links)) {
            if (! in_array($max - 1, $links))
                echo '<li class="dots_pagination">...</li>' . "\n";

            $class = $paged == $max ? ' class="active-page"' : '';
            printf('<li><a %s href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
        }

        /** Next Post Link */
        if (get_next_posts_link())
            printf('<li class="btn-next">%s</li>' . "\n", get_next_posts_link("<span class=\"icon-option-arrow-right --arrow\"></span>"));

        echo '</ul></div>' . "\n";
    }
}



/**
 * tùy chỉnh breadcrumb
 *
 * @author hien-tech (hiennd@ancu.com)
 * @since 2019-07-03
 */
function vnb_custom_breadcrumb($object_id, $bc_type, $country_name)
{
	$result = '';
	$page_arr = json_decode(PAGE_ARR, true); // ICL_LANGUAGE_CODE

	if ($bc_type != 'how_to_get') {
		if (empty($object_id)) return $result;

		$post_info = get_post($object_id);
		if (empty($post_info)) return $result;

		if ($bc_type == 'embassy_city') {
			$bc_subtitle = ucwords($post_info->post_name);
		} elseif ($bc_type == 'visa_embassy') {
			$prefix_country = __('Vietnam Embassy in', 'vnbgroup');
			$bc_subtitle = str_replace($prefix_country, '', $post_info->post_title);
		} else {
			$bc_subtitle = get_field('bc_subtitle', $object_id);
			if (empty($bc_subtitle)) $bc_subtitle = $post_info->post_title;
		}

		if ($bc_type == 'default') {
			$bc_type = get_field('bc_type', $object_id);
			if (empty($bc_type)) $bc_type = 'default';
		}
	}

	// mảng breadcrumb
	$breadcrumb_arr = [
		[
			'link' => esc_url(home_url('/')),
			'title' => __('Home', 'wpestate')
		]
	];

	if (in_array($bc_type, ['visa_guide', 'airport_service', 'visa_embassy', 'embassy_city'])) {
		if (in_array($bc_type, ['visa_embassy', 'embassy_city'])) {
			// $bc_type = 'vietnam_embassy';
			$ref_link = HOME_URI . 'embassy/';
			$ref_title = __('Vietnam Embassy', 'vnbgroup');
		} else {
			$ref_id = $page_arr[ICL_LANGUAGE_CODE][$bc_type];
			$ref_link = get_the_permalink($ref_id);
			$ref_title = get_field('bc_subtitle', $ref_id);
			if (empty($ref_title)) $ref_title = get_the_title($ref_id);
		}

		// cho vào mảng breadcrumb
		$breadcrumb_arr[] = [
			'link' => $ref_link,
			'title' => $ref_title
		];
	} elseif (in_array($bc_type, ['requirement', 'how_to_get'])) {
		$visa_guide_id = $page_arr[ICL_LANGUAGE_CODE]['visa_guide'];
		$visa_guide_link = get_the_permalink($visa_guide_id);
		$visa_guide_title = get_field('bc_subtitle', $visa_guide_id);
		if (empty($visa_guide_title)) $visa_guide_title = get_the_title($visa_guide_id);

		$bc_type = ($bc_type == 'requirement') ? 'visa_requirement' : 'how_to_get';
		$r_htg_id = $page_arr[ICL_LANGUAGE_CODE][$bc_type];
		$r_htg_link = get_the_permalink($r_htg_id);
		$r_htg_title = get_field('bc_subtitle', $r_htg_id);
		if (empty($r_htg_title)) $r_htg_title = get_the_title($r_htg_id);

		if ($bc_type == 'visa_requirement') {
			$countries = wp_get_post_terms($object_id, 'countries');
			$bc_subtitle = (empty($countries)) ? '' : $countries[0]->name;
		} else {
			$bc_subtitle = $country_name;
		}

		// cho vào mảng breadcrumb
		$breadcrumb_arr[] = [
			'link' => $visa_guide_link,
			'title' => $visa_guide_title
		];
		$breadcrumb_arr[] = [
			'link' => $r_htg_link,
			'title' => $r_htg_title
		];
	} elseif (in_array($bc_type, ['blog'])) {
		// cho vào mảng breadcrumb
		$breadcrumb_arr[] = [
			'link' => 'https://www.vietnam-visa.com/blog/',
			'title' => 'Blog'
		];
	}

	$breadcrumb_arr[] = [
		'link' => '#',
		'title' => $bc_subtitle
	];
	$result .= '<div class="wrap-breadcrumb">';
        $result .= '<div class="container"> <div class="row"> <div class="col-lg-12"> <ul>';
            $check_position = count($breadcrumb_arr) - 1;
            foreach ($breadcrumb_arr as $key => $value) {
                if ($key == $check_position) {
                    $result .= '<li>'.$value['title'].'</li>';
                } else {
                    $result .= '<li>';
                    $result .= '<a href="'.$value['link'].'">'.$value['title'].'</a>';
                    $result .= '</li>';
                    $result .= '<li class="brc-arrow"><span class="icon-menu-arrow-right"></span></li>';
                }
            }
            foreach ($breadcrumb_arr as $key => $value) {
                $result .= '</ul> </div> </div>';
            }
        $result .= '</div>';
    $result .= '</div>';

	// schema cho breadcrumb
	$result .= '<script type="application/ld+json">';
	$result .= '{"@context": "https://schema.org",';
	$result .= '"@type": "BreadcrumbList",';
	$result .= '"itemListElement": [';
	foreach ($breadcrumb_arr as $key => $value) {
		if ($key == count($breadcrumb_arr) - 1) break;

		$comma_last = ($key == count($breadcrumb_arr) - 2) ? '' : ',';
		$result .= '{';
		$result .= '"@type": "ListItem",';
		$result .= '"position": ' . ($key + 1) . ',';
		$result .= '"name": "' . $value['title'] . '",';
		$result .= '"item": "' . $value['link'] . '"';
		$result .= '}';
		$result .= $comma_last;
	}
	$result .= ']}</script>';

	return $result;
}
