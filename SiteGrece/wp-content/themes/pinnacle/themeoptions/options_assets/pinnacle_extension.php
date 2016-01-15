<?php

if ( class_exists( 'Redux' ) ) {
    $opt_name = 'pinnacle';
    Redux::setExtensions( $opt_name, dirname( __FILE__ ) . '/extensions/' );
}
