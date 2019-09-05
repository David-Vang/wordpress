<?php
/**
 * Plugin Name: DakotahSport Gutenberg Fields
 * Description: Custom Gutenberg Template Blocks
 * Author: Dave Vang / SMSC Marketing
 * Author URI: http://smscmarketing.org
 * Version: 1.1.2
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Gutenberg Templates
 */

/* pages */

class DakotahSport_Fields {
    /**
     * Initialize all the things
     */
    function __construct() {
        add_action( 'init', array($this, 'add_fields_to_pages') );
    }

    function add_fields_to_pages() {
    
        $post_type_object = get_post_type_object( 'post' );
        
        $post_type_object->template = array(
        
            array( 'core/heading', array(
                //'content'		=> 'Page Call To Action',
                'placeholder' => 'Add Call To Action Heading',
            ) ),
        
        );
        $post_type_object->template_lock = 'all';	 
    }

    function gutenberg_examples_01_register_block() {
        if ( ! function_exists( 'register_block_type' ) ) {
            // Gutenberg is not active.
            return;
        }
        wp_register_script(
            'gutenberg-examples-01',
            array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
		    filemtime( plugin_dir_path( __FILE__ ) . 'block.js' )
        );
     
        register_block_type( 'gutenberg-examples/example-01-basic', array(
            'editor_script' => 'gutenberg-examples-01',
        ) );
     
    }
}	 

new DakotahSport_Fields();