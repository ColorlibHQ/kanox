<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Define constant
	 *
	 */
	
	 
	// Base URI
	if( !defined( 'KANOX_DIR_URI' ) )
		define( 'KANOX_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'KANOX_DIR_ASSETS_URI' ) )
		define( 'KANOX_DIR_ASSETS_URI', KANOX_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'KANOX_DIR_CSS_URI' ) )
		define( 'KANOX_DIR_CSS_URI', KANOX_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'KANOX_DIR_JS_URI' ) )
		define( 'KANOX_DIR_JS_URI', KANOX_DIR_ASSETS_URI .'js/' );
	
	// Icon Images
	if( !defined('KANOX_DIR_ICON_IMG_URI') )
		define( 'KANOX_DIR_ICON_IMG_URI', KANOX_DIR_ASSETS_URI.'img/icon/' );
	
	//DIR inc
	if( !defined( 'KANOX_DIR_INC' ) )
		define( 'KANOX_DIR_INC', KANOX_DIR_URI.'inc/' );

	//Elementor Widgets Folder Directory
	if( !defined( 'KANOX_DIR_ELEMENTOR' ) )
		define( 'KANOX_DIR_ELEMENTOR', KANOX_DIR_INC.'elementor-widgets/' );

	// Base Directory
	if( !defined( 'KANOX_DIR_PATH' ) )
		define( 'KANOX_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'KANOX_DIR_PATH_INC' ) )
		define( 'KANOX_DIR_PATH_INC', KANOX_DIR_PATH.'inc/' );
	
	//Colorlib framework Folder Directory
	if( !defined( 'KANOX_DIR_PATH_LIB' ) )
		define( 'KANOX_DIR_PATH_LIB', KANOX_DIR_PATH_INC.'libraries/' );
	
	//Classes Folder Directory
	if( !defined( 'KANOX_DIR_PATH_CLASSES' ) )
		define( 'KANOX_DIR_PATH_CLASSES', KANOX_DIR_PATH_INC.'classes/' );

	
	//Widgets Folder Directory
	if( !defined( 'KANOX_DIR_PATH_WIDGET' ) )
		define( 'KANOX_DIR_PATH_WIDGET', KANOX_DIR_PATH_INC.'widgets/' );
		
	//Elementor Widgets Folder Directory
	if( !defined( 'KANOX_DIR_PATH_ELEMENTOR_WIDGETS' ) )
		define( 'KANOX_DIR_PATH_ELEMENTOR_WIDGETS', KANOX_DIR_PATH_INC.'elementor-widgets/' );
	

		
	/**
	 * Include File
	 *
	 */
	
	// Breadcrumbs file include
	require_once( KANOX_DIR_PATH_INC . 'kanox-breadcrumbs.php' );
	// Sidebar register file include
	require_once( KANOX_DIR_PATH_INC . 'widgets/kanox-widgets-reg.php' );
	// Post widget file include
	require_once( KANOX_DIR_PATH_INC . 'widgets/kanox-recent-post-thumb.php' );
	// News letter widget file include
	require_once( KANOX_DIR_PATH_INC . 'widgets/kanox-newsletter-widget.php' );
	//Social Links
	require_once( KANOX_DIR_PATH_INC . 'widgets/kanox-social-links.php' );
	// Instagram Widget
	require_once( KANOX_DIR_PATH_INC . 'widgets/kanox-instagram.php' );
	// Nav walker file include
	require_once( KANOX_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	// Theme function file include
	require_once( KANOX_DIR_PATH_INC . 'kanox-functions.php' );

	// Theme Demo file include
	require_once( KANOX_DIR_PATH_INC . 'demo/demo-import.php' );

	// Post Like
	require_once( KANOX_DIR_PATH_INC . 'post-like.php' );
	// Theme support function file include
	require_once( KANOX_DIR_PATH_INC . 'support-functions.php' );
	// Html helper file include
	require_once( KANOX_DIR_PATH_INC . 'wp-html-helper.php' );
	// Pagination file include
	require_once( KANOX_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	// Elementor Widgets
	require_once( KANOX_DIR_PATH_ELEMENTOR_WIDGETS . 'elementor-widget.php' );
	//
	require_once( KANOX_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	
	require_once( KANOX_DIR_PATH_CLASSES . 'Class-Config.php' );
	// Customizer
	require_once( KANOX_DIR_PATH_INC . 'customizer/customizer.php' );
	// Class autoloader
	require_once( KANOX_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	// Class kanox dashboard
	require_once( KANOX_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );
	// Common css
	require_once( KANOX_DIR_PATH_INC . 'kanox-commoncss.php' );


	if( class_exists( 'RW_Meta_Box' ) ){
		// Metabox Function
		require_once( KANOX_DIR_PATH_INC . 'kanox-metabox.php' );
	}
	

	// Admin Enqueue Script
	function kanox_admin_script(){
		wp_enqueue_style( 'kanox-admin', get_template_directory_uri().'/assets/css/kanox_admin.css', false, '1.0.0' );
		wp_enqueue_script( 'kanox_admin', get_template_directory_uri().'/assets/js/kanox_admin.js', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'kanox_admin_script' );

	 
	// WooCommerce style desable
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );


	/**
	 * Instantiate Kanox object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features, Kanox Dashboard .
	 *
	 */
	
	$Kanox = new Kanox();
	
