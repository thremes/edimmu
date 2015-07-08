<?php

final class Edimmu_Assets
{
    function __setup()
    {
        add_action( 'wp_enqueue_scripts', array( $this, 'fonts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );
    }

    function fonts()
    {
        $google_fonts = new Edimmu_Google_Fonts();
        $google_fonts->family(
            'Lora:400italic,700italic',
            /*
             * Translators: If there are characters in your language that are not supported
             * by Lora, translate this to 'off'. Do not translate into your own language.
             */
            _x( 'on', 'Lora font: on or off', 'edimmu' )
        );
        $google_fonts->family(
            'Open Sans:400,300,300italic,700,600,800',
            /*
             * Translators: If there are characters in your language that are not supported
             * by Open Sans, translate this to 'off'. Do not translate into your own language.
             */
            _x( 'on', 'Open Sans font: on or off', 'edimmu' )
        );

        wp_enqueue_style( 'edimmu-fonts', $google_fonts->url() );
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