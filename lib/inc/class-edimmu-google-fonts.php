<?php

final class Edimmu_Google_Fonts
{
    private $fonts = array();

    function family( $font, $active = 'on' )
    {
        if ( 'off' !== $active ) {
            $this->fonts[ ] = $font;
        }
    }

    public function url()
    {
        if ( $this->fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $this->fonts ) ),
                'subset' => urlencode( $this->subsets() ),
            ), '//fonts.googleapis.com/css' );
        }

        return isset( $fonts_url ) ? $fonts_url : '';
    }

    private function subsets()
    {
        $subsets = 'latin,latin-ext';

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

        return $subsets;
    }
}