<?php
/*
Plugin Name: Wonder WooCommerce Quick View Trial
Plugin URI: https://www.wonderplugin.com/woocommerce-quick-view/
Description: Wonder Quick View adds a quick view button to products in the WooCommerce shop page.
Version: 2.5
Author: Magic Hills Pty Ltd
Author URI: https://www.wonderplugin.com
WC requires at least: 3.3.0
WC tested up to: 4.3.0
License: Copyright 2019 Magic Hills Pty Ltd, All Rights Reserved
*/

if ( ! defined( 'ABSPATH' ) )
	exit;

if ( defined( 'WONDERPLUGIN_WOOQUICKVIEW_BASENAME' ) )
	return;

define( 'WONDERPLUGIN_WOOQUICKVIEW_BASENAME', basename(__FILE__) );
define( 'WONDERPLUGIN_WOOQUICKVIEW_COMMON', '1.0' );

require_once 'app/class-wonderplugin-wooquickview-controller.php';

class WonderPlugin_WooQuickView_Plugin {

	public $controller, $common, $update;
	public $version, $plugin_url, $plugin_name, $plugin_version, $plugin_license_type;

	function __construct() {

		$this->init();
	}
	
	function init() {
		
		$this->version = '2.5';
		$this->plugin_url = plugin_dir_url( __FILE__ );

		// for plugin update
		$this->plugin_name = basename( dirname( __FILE__ ) ) . '/' . basename( __FILE__ );
		$this->plugin_version = '2.5';
		$this->plugin_license_type = 'T';
		$this->plugin_license_name = 'Trial';

		// update product list
		add_filter( 'wonderplugin_woocommerce_update_productlist', array($this, 'add_plugin_update') );

		// plugin init
		add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array($this, 'modify_plugin_action_links') );

		add_action( 'admin_menu', array($this, 'register_menu') );
		add_filter( 'custom_menu_order', array($this, 'change_submenu_order') );

		add_action( 'init', array($this, 'register_script') );
		add_action( 'wp_enqueue_scripts', array($this, 'enqueue_script') );
		
		// shortcode
		add_shortcode( 'wonderplugin_wooquickview_content', array($this, 'content_shortcode_handler') );

		// init controller
		$this->controller = new WonderPlugin_WooQuickView_Controller( $this );

		// init common module
		if ( !class_exists( 'WonderPlugin_WooCommerce_Common' ) )
		{
			$initcommon = true;

			$version = get_option( 'wonderplugin_woocommerce_version' );	
			
			if ( !empty( $version ) && is_array( $version ) )
			{
				foreach( $version as $item )
				{
					if ( version_compare( $item['commonversion'], WONDERPLUGIN_WOOQUICKVIEW_COMMON, '>' ) 
						&& ( $item['classname'] != 'WonderPlugin_WooQuickView_Plugin' ) 
						&& class_exists( $item['classname'] ) ) 
					{
						$initcommon = false;
						break;	
					}	
				}
			}

			if ( $initcommon )
			{
				require_once 'common/class-wonderplugin-woocommerce-common.php';
				$this->common = new WonderPlugin_WooCommerce_Common( $this );
			}
		}

		$this->controller->init_hooks();
	}

	function add_plugin_update( $data ) {

		$info = new stdClass;

		$info->title = 'Wonder WooCommerce Quick View';
		$info->product = 'wooquickview';
		$info->slug = 'wonderplugin-wooquickview';
		$info->plugin = $this->plugin_name;
		$info->version = $this->plugin_version;
		$info->license_type = $this->plugin_license_type;
		$info->order_link = 'https://www.wonderplugin.com/woocommerce-quick-view/order/';
		$info->info_option_name = 'wonderplugin_wooquickview_information';

		$data[] = $info;

		return $data;
	}

	function modify_plugin_action_links( $links ) {
		
		$links[] = '<a href="'. admin_url( 'admin.php?page=wonderplugin_wooquickview' ) . '">Settings</a>';
		return $links;
	}
	
	function register_menu() {

		if ( empty( $GLOBALS['admin_page_hooks']['wonderplugin_woocommerce_overview'] ) )
		{
			$menu = add_menu_page(
				__('Wonder WooCommerce', 'wonderplugin'),
				__('Wonder WooCommerce', 'wonderplugin'),
				'manage_options',
				'wonderplugin_woocommerce_overview',
				'',
				plugin_dir_url( __FILE__ ) . 'images/logo-16.png' );
		}

		if ( isset( $this->common ) )
		{
			$menu = add_submenu_page(
				'wonderplugin_woocommerce_overview',
				__('Overview', 'wonderplugin'),
				__('Overview', 'wonderplugin'),
				'manage_options',
				'wonderplugin_woocommerce_overview',
				array($this->common, 'show_overview' ) );
			add_action( 'admin_print_styles-' . $menu, array($this, 'enqueue_common_admin_script') );

			$menu = add_submenu_page(
				'wonderplugin_woocommerce_overview',
				__('Tools', 'wonderplugin'),
				__('Tools', 'wonderplugin'),
				'manage_options',
				'wonderplugin_woocommerce_tools',
				array($this->common, 'show_tools' ) );
			add_action( 'admin_print_styles-' . $menu, array($this, 'enqueue_common_admin_script') );
	
		}

		$menu = add_submenu_page(
			'wonderplugin_woocommerce_overview',
			__('Quick View Trial', 'wonderplugin'),
			__('Quick View Trial', 'wonderplugin'),
			'manage_options',
			'wonderplugin_wooquickview',
			array($this->controller, 'show_options' ) );
		add_action( 'admin_print_styles-' . $menu, array($this, 'enqueue_admin_script') );		
	}

	function change_submenu_order( $menu_order ) {

		global $submenu;

		$menu_slug = 'wonderplugin_woocommerce_overview';
		$overview_slug = 'wonderplugin_woocommerce_overview';
		$register_slug = 'wonderplugin_woocommerce_register';
		$tools_slug = 'wonderplugin_woocommerce_tools';

		if ( !empty( $submenu[ $menu_slug ] ) )
		{
			foreach( $submenu[ $menu_slug ] as $index => $item )
			{
				if ( $item[2] == $overview_slug )
				{
					$overviewitem = $submenu[ $menu_slug ][ $index ];
					unset( $submenu[ $menu_slug ][ $index ] );
				}	
				else if ( $item[2] == $register_slug )
				{
					$registeritem = $submenu[ $menu_slug ][ $index ];
					unset( $submenu[ $menu_slug ][ $index ] );					
				}	
				else if ( $item[2] == $tools_slug )
				{
					$toolsitem = $submenu[ $menu_slug ][ $index ];
					unset( $submenu[ $menu_slug ][ $index ] );	
				}	
			}

			if ( isset( $overviewitem ) )
			{
				array_unshift( $submenu[ $menu_slug ], $overviewitem);
			}

			if ( isset( $toolsitem ) )
			{
				$submenu[ $menu_slug ][] = $toolsitem;
			}

			if ( isset( $registeritem ) )
			{
				$submenu[ $menu_slug ][] = $registeritem;
			}
		}

		return $menu_order;
	}

	function register_script()
	{		
		// common style and script
		wp_register_script( 'wonderplugin-woocommerce-admin', plugin_dir_url( __FILE__ ) . 'common/wonderplugin-woocommerce-admin.js', array('jquery', 'wp-color-picker', 'jquery-ui-dialog', 'post'), $this->version, false);
		wp_register_style( 'wonderplugin-woocommerce-admin', plugin_dir_url( __FILE__ ) . 'common/wonderplugin-woocommerce-admin.css', array(), $this->version);
		
		// quickview style and script
		wp_register_script( 'wonderplugin-wooquickview-admin', plugin_dir_url( __FILE__ ) . 'app/wonderplugin-wooquickview-admin.js', array('jquery', 'wp-color-picker', 'jquery-ui-dialog', 'post'), $this->version, false);
		wp_register_style( 'wonderplugin-wooquickview-admin', plugin_dir_url( __FILE__ ) . 'wonderplugin-wooquickview.css', array(), $this->version);
		
		wp_register_script( 'wonderplugin-wooquickview', plugin_dir_url( __FILE__ ) . 'engine/wonderwooquickview.js', array('jquery', 'flexslider'), $this->version, false);
		wp_register_style( 'wonderplugin-wooquickview', plugin_dir_url( __FILE__ ) . 'engine/wonderwooquickview.css', array(), $this->version);

		wp_register_script( 'wonderplugin-woolightbox', plugin_dir_url( __FILE__ ) . 'engine/wonderwoolightbox.js', array('jquery'), $this->version, false);
	}

	function enqueue_script()
	{
		wp_enqueue_style( 'flexslider' );
		wp_enqueue_style( 'wonderplugin-wooquickview' );

		$settings = $this->get_settings();
		if ( $settings['addjstofooter'] )
		{
			wp_enqueue_script( 'wonderplugin-woolightbox', false, array(), false, true );
			wp_enqueue_script( 'wonderplugin-wooquickview', false, array(), false, true );
		}
		else
		{
			wp_enqueue_script( 'wonderplugin-woolightbox' );
			wp_enqueue_script( 'wonderplugin-wooquickview' );	
		}
	}

	function enqueue_common_admin_script( $hook )
	{
		wp_enqueue_style( 'wonderplugin-woocommerce-admin' );
		wp_enqueue_script( 'wonderplugin-woocommerce-admin' );
	}

	function enqueue_admin_script( $hook )
	{
		$this->enqueue_common_admin_script( $hook );

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'wp-jquery-ui-dialog' );

		wp_enqueue_style( 'wonderplugin-wooquickview-admin' );
		wp_enqueue_script( 'wonderplugin-wooquickview-admin' );
		
		wp_enqueue_script( 'wonderplugin-woolightbox' );
	}

	function get_settings() {

		$defaults = array(
			'keepdata'			=> 1,
			'addjstofooter'		=> 0,
			'disableupdate'		=> 0
		);

		$settings = get_option( 'wonderplugin_woocommerce_settings', array() );
				
		return array_merge( $defaults, $settings );
	}

	// Shortcode
	function content_shortcode_handler( $atts ) {

		if ( !isset( $atts['id'] ) )
			return;

		$product_id = $atts['id'];
		unset( $atts['id'] );
		
		$show = ( isset( $atts['show'] ) && !$atts['show'] ) ? false : true;
		unset( $atts['show'] );

		$this->controller->output_quickview_content_by_product_id( $product_id, $show, $atts );
	}

	// API
	function output_quickview_content_by_product_id( $product_id, $show, $atts ) {
		
		$this->controller->output_quickview_content_by_product_id( $product_id, $show, $atts );
	}
}

/**
 * Init global plugin object
 */

$wonderplugin_wooquickview = NULL;

if ( !function_exists('wonderplugin_wooquickview_init') )
{
	function wonderplugin_wooquickview_init() {

		if ( ! class_exists('WooCommerce') )
			return;

		global $wonderplugin_wooquickview;

		$wonderplugin_wooquickview = new WonderPlugin_WooQuickView_Plugin();
	}
	add_action( 'plugins_loaded', 'wonderplugin_wooquickview_init' );
}

/**
 * Uninstall
 */

if ( !function_exists('wonderplugin_wooquickview_uninstall') )
{
	function wonderplugin_wooquickview_uninstall() {

		if ( ! current_user_can( 'activate_plugins' ) )
			return;
			
		$settings = get_option( 'wonderplugin_woocommerce_settings', array(
			'keepdata'			=> 1,
			'addjstofooter'		=> 0,
			'disableupdate'		=> 0
		) );
		
		if ( $settings['keepdata']  == 0)
		{
			delete_option( "wonderplugin_wooquickview_options" );
		}
	}
	
	if ( function_exists('register_uninstall_hook') )
	{
		register_uninstall_hook( __FILE__, 'wonderplugin_wooquickview_uninstall' );
	}
}


/**
 * Activation and deactivation
 */
if ( !function_exists('wonderplugin_wooquickview_activation') )
{
	function wonderplugin_wooquickview_activation() {

		$info = array(
			'name'			=> 'wooquickview',
			'classname'		=> 'WonderPlugin_WooQuickView_Plugin',
			'plugin'		=> basename( dirname( __FILE__ ) ) . '/' . basename( __FILE__ ),
			'version'		=> '2.5',
			'commonversion'	=> WONDERPLUGIN_WOOQUICKVIEW_COMMON
		);

		$version = get_option( 'wonderplugin_woocommerce_version', array() );
		
		if ( !empty( $version ) && is_array( $version ) )
		{
			$newplugin = true;
			foreach( $version as $index => $item )
			{
				if ( $version[$index]['name'] == $info['name'] )
				{
					$version[$index]['version'] = $info['version'];
					$version[$index]['commonversion'] = $info['commonversion'];
					
					$newplugin = false;
					break;
				}
			}
			if ( $newplugin )
			{
				$version[] = $info;	
			}
		}
		else
		{
			$version[] = $info;
		}

		update_option( 'wonderplugin_woocommerce_version', $version );
	}
	register_activation_hook( __FILE__, 'wonderplugin_wooquickview_activation' );
}

if ( !function_exists('wonderplugin_wooquickview_deactivation') )
{
	function wonderplugin_wooquickview_deactivation() {

		$version = get_option( 'wonderplugin_woocommerce_version', array() );
		
		if ( !empty( $version ) && is_array( $version ) )
		{
			foreach( $version as $index => $item )
			{
				if ( $version[$index]['name'] == 'wooquickview' )
				{
					unset( $version[$index] );
				}
			}
			update_option( 'wonderplugin_woocommerce_version', $version );
		}
	}
	register_deactivation_hook( __FILE__, 'wonderplugin_wooquickview_deactivation' );
}
