<?php

final class Edimmu_Assets
{
    function setup()
    {
        add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );
    }

    function styles()
    {
        wp_dequeue_style( 'simppeli-fonts' );
        wp_dequeue_style( 'simppeli-parent-style' );
        wp_dequeue_style( 'simppeli-style' );

        $theme_uri = trailingslashit( get_stylesheet_directory_uri() );
        wp_enqueue_style( 'edimmu-normalize', "{$theme_uri}lib/assets/css/normalize.css" );
        wp_enqueue_style( 'edimmu-theme', "{$theme_uri}lib/assets/css/theme.css" );
        wp_enqueue_style( 'edimmu-style', "{$theme_uri}style.css" );
    }
}