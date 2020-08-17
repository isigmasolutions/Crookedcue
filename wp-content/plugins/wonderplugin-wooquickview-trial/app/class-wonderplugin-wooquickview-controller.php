<?php 

if ( ! defined( 'ABSPATH' ) )
	exit;
	
require_once 'class-wonderplugin-wooquickview-model.php';
require_once 'class-wonderplugin-wooquickview-view.php';

class WonderPlugin_WooQuickView_Controller {

	public $plugin;
	private $view, $model, $update;

	function __construct( $plugin ) {

		$this->plugin = $plugin;

		$this->model = new WonderPlugin_WooQuickView_Model($this);	
		$this->view = new WonderPlugin_WooQuickView_View($this);
	}

	function init_hooks() {

		// tools
		if ( is_admin() )
		{
			add_action( 'admin_post_wonderplugin_wooquickview_export', array($this, 'export_xml') );
		}
		add_action( 'wonderplugin_woocommerce_addtools_tab', array($this->view, 'show_tools_tab') );
		add_action( 'wonderplugin_woocommerce_addtools_panel', array($this->view, 'show_tools_panel') );

		$this->model->init_hooks();
	}

	function output_lightbox_options() {

		echo $this->model->get_lightbox_options();
	}

	function show_options() {

		$this->view->show_options();
	}

	function save_options( $options ) {

		$this->model->save_options( $options );
	}

	function get_options() {

		return $this->model->get_options();
	}

	function get_default_options() {

		return $this->model->get_default_options();
	}

	function output_quickview_content_by_product_id( $product_id, $show, $atts ) {
		
		$this->model->output_quickview_content_by_product_id( $product_id, $show, $atts );
	}

	// tools
	function import_xml($post, $files)
	{
		return $this->model->import_xml($post, $files);
	}

	function export_xml() {
	
		check_admin_referer('wonderplugin-wooquickview', 'wonderplugin-wooquickview-export');
	
		if ( !current_user_can('manage_options') )
			return;
	
		$this->model->export_xml();
	}
}