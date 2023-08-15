<?php 
/**
 * Wedding plugin functions
 * 
 * @package wedding-theme
 */

// Exit if directly accessed
defined( 'ABSPATH' ) || exit;

add_filter( 'acf/settings/save_json', 'acf_json_save_point' );
add_filter( 'acf/settings/load_json', 'acf_json_load_point' );		
add_filter( 'acf/json_directory', 'acf_json_save_point' );	

function acf_json_save_point( $path ){

    return dirname(__FILE__) . '/acf-json';

}

function acf_json_load_point( $path ){

    $path[] =  dirname(__FILE__) . '/acf-json';
    return $path;		

}
