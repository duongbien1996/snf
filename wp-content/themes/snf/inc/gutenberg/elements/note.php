<?php
/**
 * VNB Lazy Block & Shortcode
 * @author biendv@ancu.com
 * @since 23/09/2020
 */

$lb_label = 'VN-visa Note';
$lb_slug = 'vn-visa-note';

if ( function_exists( 'lazyblocks' ) ) :

    lazyblocks()->add_block( array(
        'id' => 35234,
        'title' => $lb_label,
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M9 11.75c-.69 0-1.25.56-1.25 1.25s.56 1.25 1.25 1.25 1.25-.56 1.25-1.25-.56-1.25-1.25-1.25zm6 0c-.69 0-1.25.56-1.25 1.25s.56 1.25 1.25 1.25 1.25-.56 1.25-1.25-.56-1.25-1.25-1.25zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8 0-.29.02-.58.05-.86 2.36-1.05 4.23-2.98 5.21-5.37C11.07 8.33 14.05 10 17.42 10c.78 0 1.53-.09 2.25-.26.21.71.33 1.47.33 2.26 0 4.41-3.59 8-8 8z" /></svg>',
        'keywords' => array(
        ),
        'slug' => 'lazyblock/'.$lb_slug,
        'description' => '',
        'category' => 'text',
        'category_label' => 'text',
        'supports' => array(
            'customClassName' => true,
            'anchor' => false,
            'align' => array(
                0 => 'wide',
                1 => 'full',
            ),
            'html' => false,
            'multiple' => true,
            'inserter' => true,
        ),
        'ghostkit' => array(
            'supports' => array(
                'spacings' => false,
                'display' => false,
                'scrollReveal' => false,
                'frame' => false,
                'customCSS' => false,
            ),
        ),
        'controls' => array(
            'control_545af94e15' => array(
                'type' => 'text',
                'name' => 'heading',
                'default' => '',
                'label' => 'Heading',
                'help' => '',
                'child_of' => '',
                'placement' => 'content',
                'width' => '100',
                'hide_if_not_selected' => 'false',
                'save_in_meta' => 'false',
                'save_in_meta_name' => '',
                'required' => 'false',
                'placeholder' => '',
                'characters_limit' => '',
            ),
            'control_1d18ee41bc' => array(
                'type' => 'classic_editor',
                'name' => 'list-of-notes',
                'default' => '',
                'label' => 'List Of Notes',
                'help' => '',
                'child_of' => '',
                'placement' => 'content',
                'width' => '100',
                'hide_if_not_selected' => 'false',
                'save_in_meta' => 'false',
                'save_in_meta_name' => '',
                'required' => 'false',
                'placeholder' => '',
                'characters_limit' => '',
            ),
            'control_5bd9124bba' => array(
                'type' => 'radio',
                'name' => 'select_display',
                'default' => 'note',
                'label' => 'Select Display',
                'help' => '',
                'child_of' => '',
                'placement' => 'content',
                'width' => '100',
                'hide_if_not_selected' => 'false',
                'save_in_meta' => 'false',
                'save_in_meta_name' => '',
                'required' => 'false',
                'placeholder' => '',
                'characters_limit' => '',
                'choices' => array(
                    array(
                        'label' => 'Note',
                        'value' => 'note',
                    ),
                    array(
                        'label' => 'Border left',
                        'value' => 'border-left',
                    ),
                ),
            ),
        ),
        'code' => array(
            'output_method' => 'html',
            'editor_html' => '',
            'editor_callback' => '',
            'editor_css' => '',
            'frontend_html' => '',
            'frontend_callback' => '',
            'frontend_css' => '',
            'show_preview' => 'always',
            'single_output' => false,
        ),
        'condition' => array(
        ),
    ) );
    
endif;

if (!function_exists('vnvisa_note_output_editor')) {
    function vnvisa_note_output_editor($output, $attributes){
        $shortcode = '[vnvisa_note]';
		return vnb_lb_template_editor($shortcode);
    }
    add_filter('lazyblock/' . $lb_slug . '/editor_callback', 'vnvisa_note_output_editor', 10, 2);
}

if (!function_exists('vnvisa_note_output_front_end')) {
    function vnvisa_note_output_front_end($output, $attributes) {
        $heading = urlencode($attributes['heading']);
        $list_note = urlencode($attributes['list-of-notes']);
        $selct_disp = urlencode($attributes['select_display']);
        $shortcode = '[vnvisa_note
                        heading="'. $heading. '"
                        list_note="'. $list_note .'"
                        selct_disp="'. $selct_disp .'"
                    ]';
		return $shortcode;
    }
    add_filter('lazyblock/' . $lb_slug . '/frontend_callback', 'vnvisa_note_output_front_end', 10, 2);
}

// Create Shortcode 
if( !function_exists('vnb_shortcode_vnvisa_note')) {
    function vnb_shortcode_vnvisa_note($attr){
        if (!$attr) return __('Shortcode chưa được truyền tham số.', DEV_TEXTDOMAIN);
        $heading = urldecode($attr['heading']);
        $list_note = urldecode($attr['list_note']);
        $selct_disp = urldecode($attr['selct_disp']);
        /**
         * Kiểm tra tính tồn tại tham số truyền vào
         */
        ob_start();
        ?>
        <!-- HTML Code here -->
        <div class=" <?php echo $selct_disp == 'note' ? 'shor__note' : 'bod-left' ?>">
            <h2 class="hd-2 mt-0"><?php echo $heading ?></h2>
            <?php echo $list_note ?>
        </div>
        <?php
        $result = ob_get_contents();
        ob_end_clean();
        return $result;
    }
    add_shortcode('vnvisa_note', 'vnb_shortcode_vnvisa_note');
}

