<?php
/**
 * Theme Functions and Definitions
 */

function portfolio_enqueue_styles() {
    // 1. Get the URI path to the compiled stylesheet for the browser
    $stylesheet_uri = get_template_directory_uri() . '/assets/css/main.css';
    
    // 2. Get the physical file path on the server to check the file modification time
    $stylesheet_path = get_template_directory() . '/assets/css/main.css';
    
    // 3. Set up a fallback version number, or use the file timestamp to clear browser cache automatically
    $version = file_exists($stylesheet_path) ? filemtime($stylesheet_path) : '1.0.0';

    // 4. Register and enqueue the style block natively
    wp_enqueue_style(
        'portfolio-tailwind-styles', // Unique handle for this asset
        $stylesheet_uri,             // URL source string
        array(),                     // Dependencies (none)
        $version                     // Dynamic version control string
    );
}

// Hook the function into the front-end enqueue sequence
add_action('wp_enqueue_scripts', 'portfolio_enqueue_styles');