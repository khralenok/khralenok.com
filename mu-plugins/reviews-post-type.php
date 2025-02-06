<?php

function reviews_post_type(){
    register_post_type('review',[
        'public' => true,
        'show_in_rest' => false,
        'supports' => ['title', 'editor','thumbnail'],
        'labels' => [
            'name' => 'Reviews',
            'add_new_item' => 'Add New Review',
            'edit_item' => 'Edit Review',
            'all_items' => 'All Reviews',
            'singular_name' => 'Review',
        ],
        'menu_icon' => 'dashicons-format-status',
    ]);
}

add_action('init', 'reviews_post_type');

function contacts_post_type(){
    register_post_type('contact',[
        'public' => false,
        'show_ui' => true,
        'show_in_rest' => false,
        'supports' => ['title', 'editor'],
        'labels' => [
            'name' => 'Contacts',
            'add_new_item' => 'Add New Contact',
            'edit_item' => 'Edit Contact',
            'all_items' => 'All Reviews',
            'singular_name' => 'Contact',
        ],
        'menu_icon' => 'dashicons-id',
    ]);
}

add_action('init', 'contacts_post_type');