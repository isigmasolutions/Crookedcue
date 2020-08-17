<?php

class WC_Product_Table_REST_API {

	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'register_routes' ) );
	}

	public function register_routes() {
		register_rest_route( 'wc-product-table/v1', '/products/', array(
			'methods'	 => 'POST',
			'callback'	 => array( $this, 'get_products' )
		) );
	}

	public function get_products() {
		
	}

}