<?php

/**
 * Epsilon Dashboard  Autoloader
 *
 * @package Kanox
 * @since   1.1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class Epsilon_Dashboard_Autoloader
 */
class Epsilon_Dashboard_Autoloader {
	/**
	 * Epsilon_dashboard_Autoloader constructor.
	 */
	public function __construct() {

		spl_autoload_register( array( $this, 'load' ) );
	}

	/**
	 * This function loads the necessary files
	 *
	 * @param string $class CLASS NAME.
	 */
	public function load( $class = '' ) {

		/**
		 * All classes are prefixed with Kanox_
		 */
		$parts = explode( '_', $class );
		$bind  = implode( '-', $parts );

		/**
		 * We provide working directories
		 */
		$directories = array(
			KANOX_DIR_PATH_LIB ,
			KANOX_DIR_PATH_LIB . 'epsilon-framework/',
			KANOX_DIR_PATH_LIB . 'epsilon-theme-dashboard/',
			KANOX_DIR_PATH_LIB . 'epsilon-theme-dashboard/inc/',
			KANOX_DIR_PATH_LIB . 'epsilon-theme-dashboard/inc/helpers/',
			KANOX_DIR_PATH_LIB . 'epsilon-theme-dashboard/inc/misc/',
			KANOX_DIR_PATH_LIB . 'epsilon-theme-dashboard/inc/misc/demo-generators/',
			KANOX_DIR_PATH_LIB . 'epsilon-theme-dashboard/inc/misc/epsilon-tracking/',
			KANOX_DIR_PATH_LIB . 'epsilon-theme-dashboard/inc/misc/epsilon-tracking/trackers/',
		);

		/**
		 * Loop through them, if we find the class .. we load it !
		 */
		foreach ( $directories as $directory ) {
			if ( file_exists( $directory . 'class-' . strtolower( $bind ) . '.php' ) ) {
				require_once $directory . 'class-' . strtolower( $bind ) . '.php';

				return;
			}
		}


	}
}

new Epsilon_Dashboard_Autoloader();
