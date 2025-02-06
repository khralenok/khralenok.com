<?php

function websiteFiles() {
    wp_enqueue_style('main', get_theme_file_uri('/css/style.css'));
    wp_enqueue_style('landing', get_theme_file_uri('/css/landing.css'));
    wp_enqueue_style('typography', get_theme_file_uri('/css/typography.css'));
    wp_enqueue_style('header', get_theme_file_uri('/css/header.css'));
    wp_enqueue_style('footer', get_theme_file_uri('/css/footer.css'));
    wp_enqueue_script('header-js', get_theme_file_uri('/scripts/header.js'));
    wp_enqueue_script('form-handle-js', get_theme_file_uri('/scripts/formHandle.js'));
    wp_enqueue_script('carousel-js', get_theme_file_uri('/scripts/carousel.js'));
}

add_action('wp_enqueue_scripts','websiteFiles');

function theme_features(){
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme','theme_features');

function create_contact(WP_REST_Request $request) {
    $formData = $request->get_json_params();
    
    if(!empty($formData)){
        if($formData['fav_pow_ranger'] !== 'red'){
            return new WP_REST_Response(["success" => false, "error" => "Bot submission detected"], 400);
        }

        if($formData['time'] < 2000){
            return new WP_REST_Response(["success" => false, "error" => "Form was filled too fast. "], 400);
        }

        if(!preg_match('/^[A-Za-z\s]+$/',$formData['name'])){
            return new WP_REST_Response(["success" => false, "error" => "Suspicious data in the name field detected"], 400);
        }
        if(!preg_match('/^[a-z0-9._-]+@[a-z]+\.[a-z]+$/',$formData['email'])){
            return new WP_REST_Response(["success" => false, "error" => "Suspicious data in the email field detected"], 400);
        }
        $post_id = wp_insert_post([
            'post_type' => 'contact',
            'post_title' => sanitize_text_field($formData['name']),
            'post_status' => 'publish',
            'post_content' => sanitize_email($formData['email']),
        ]);

        return new WP_REST_Response(["success" => true], 200);
    }

    return new WP_REST_Response(["success" => false, "error" => "Submission Failed. Please try again"], 400);
}

add_action('rest_api_init', function() {
    register_rest_route('custom/v1', '/send-email', [
        'methods' => 'POST',
        'callback' => 'create_contact',
        'permission_callback' => '__return_true'
    ]);
});