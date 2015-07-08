<?php

final class Edimmu
{
    /**
     * Turn on the lights
     * ... and bootstrap the theme
     *
     * @param array $hookable
     * @param int   $priority
     */
    static function hook( array $hookable, $priority = 10 )
    {
        foreach ( $hookable as $functionality ) {
            if ( method_exists( $functionality, '__setup' ) ) {
                add_action( 'after_setup_theme', array( $functionality, '__setup' ), $priority );
            }
        }
    }
}