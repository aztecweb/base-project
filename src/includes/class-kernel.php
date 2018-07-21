<?php
/**
 * Init class
 *
 * @package Aztec
 */

namespace Aztec;

use DI\Container;

/**
 * Main theme class
 */
class Kernel {

	/**
	 * The dependency injection container
	 *
	 * @var Container
	 */
	protected $container;

	/**
	 * Initialize the container
	 *
	 * @param Container $container The application container.
	 */
	public function __construct( Container $container ) {
		$this->container = $container;
	}

	/**
	 * Load classes that add or remove hooks
	 */
	public function init() {
		$init_classes = [
			\Aztec\Setup\Assets::class,
			\Aztec\Setup\Disable_Emoji::class,
			\Aztec\Setup\Head::class,
<<<<<<< HEAD:src/Kernel.php
			\Aztec\Setup\HttpHeader::class,
			\Aztec\Setup\Textdomain::class,
=======
			\Aztec\Setup\Http_Header::class,
>>>>>>> gitlab/webpack:src/includes/class-kernel.php
		];

		foreach ( $init_classes as $class ) {
			$this->container->get( $class )->init();
		}
	}
}
