<?php

final class Edimmu_Assets
{
    function setup()
    {
        add_action( 'wp_enqueue_scripts', array( $this, 'fonts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );
    }

    function fonts()
    {
        wp_enqueue_style( 'edimmu-fonts', $this->fonts_url() );
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

    private function fonts_url()
    {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /*
         * Translators: If there are characters in your language that are not supported
         * by Lora, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Lora font: on or off', 'edimmu' ) ) {
            $fonts[ ] = 'Lora:400italic,700italic';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Open Sans, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'edimmu' ) ) {
            $fonts[ ] = 'Open+Sans:400,300,300italic,700,600,800';
        }

        /*
         * Translators: To add an additional character subset specific to your language,
         * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
         */
        $subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'edimmu' );

        if ( 'cyrillic' == $subset ) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ( 'greek' == $subset ) {
            $subsets .= ',greek,greek-ext';
        } elseif ( 'devanagari' == $subset ) {
            $subsets .= ',devanagari';
        } elseif ( 'vietnamese' == $subset ) {
            $subsets .= ',vietnamese';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), '//fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }

}