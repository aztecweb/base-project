<?php
/**
 * Theme assets setup.
 *
 * @package Aztec
 */

namespace Aztec\Setup;

use Aztec\Base;

/**
 * Manipulate the stylesheets and javascripts
 */
class Assets extends Base {

	/**
	 * Add assets hooks
	 */
	public function init() {
		add_action( 'wp_enqueue_scripts', $this->callback( 'enqueue_style' ) );
		add_action( 'wp_enqueue_scripts', $this->callback( 'enqueue_script' ) );
	}

	/**
	 * Enqueue the theme style file
	 */
	public function enqueue_style() {
		wp_enqueue_style( 'aztec-style', get_stylesheet_directory_uri() . '/assets/css/styles.css' );
	}

	/**
	 * Enqueue the JavaScript theme application
	 *
	 * Enqueue the RequireJS library file. Define the base url to the library
	 * file url path.
	 */
	function enqueue_script() {
		wp_enqueue_script( 'aztec-vendors-script', get_stylesheet_directory_uri() . '/assets/vendor.js', [], false, true );
		wp_enqueue_script( 'aztec-script', get_stylesheet_directory_uri() . '/assets/app.js', [ 'aztec-vendors-script', 'jquery' ], false, true );
	}
}
