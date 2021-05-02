<?php

/*Cấu hình gửi contact*/
add_action('wp_ajax_send_contact', 'send_contact');
add_action('wp_ajax_nopriv_send_contact', 'send_contact');

if (!function_exists('send_contact')) {
    function send_contact(){
        $data = $_POST;
        $content_mail = [];
        foreach ($data['data'] as $key => $value) {
            $content_mail[$key] = $value;
        }
        $subject = 'Information from the contact form "'. $content_mail['name'] .'"';
        $body = '';
        $body .= 'Tên : ' . $content_mail['name'] . "\n\n";
        $body .= 'Sđt : ' . $content_mail['phone'] . "\n\n";
        $body .= 'Email : ' . $content_mail['email'] . "\n\n";
        $body .= 'Url: ' . $content_mail['pathname'] . "\n\n";        
        $headers[] = 'From: ' . $content_mail['email'];
        // $headers[] = 'Cc: support@vietnam-visa.com';
        // $to = 'sales@vietnam-visa.com';
        $to = 'biendv@ancu.com';
        wp_mail($to, $subject, $body, $headers);
        echo json_encode($response);
        die();
    }
}