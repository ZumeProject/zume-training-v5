<?php
$dir = scandir( __DIR__ );
foreach ( $dir as $file ){
    if ( 'php' === substr( $file, -3, 3 ) && 'index.php' !== $file ){
        require_once( $file );
    }
}
