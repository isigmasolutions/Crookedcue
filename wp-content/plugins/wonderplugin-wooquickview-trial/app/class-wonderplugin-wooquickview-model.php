<?php 

if ( ! defined( 'ABSPATH' ) )
	exit;

class WonderPlugin_WooQuickView_Model {

	private $controller;
	private $is_mobile, $is_ipad;
	
	function __construct($controller) {
		
		$this->controller = $controller;

		$this->init();
	}

	function init() {

		$this->is_mobile = (strpos($_SERVER['HTTP_USER_AGENT'], 'iPod') !== false 
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== false 
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false );
		
		$this->is_ipad = ( strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false );
	}

	function init_hooks() {

		$options = $this->get_options();

		if ( $this->is_mobile )
			$enable = $options['enablemobile'];
		else if ( $this->is_ipad )
			$enable = $options['enableipad'];
		else
			$enable = $options['enable'];

		if ( !$enable )
			return;
		
		switch ( $options['quickviewpos'] )
		{
			case 'beforeitem':
				$hook = 'woocommerce_before_shop_loop_item';
				break;
			case 'overimage':
			case 'beforetitle':
				$hook = 'woocommerce_before_shop_loop_item_title';
				break;
			case 'aftertitle':
				$hook = 'woocommerce_shop_loop_item_title';
				break;
			case 'beforecart':
				$hook = 'woocommerce_after_shop_loop_item_title';
				break;
			case 'aftercart':
				$hook = 'woocommerce_after_shop_loop_item';
				break;
		}
		
		add_action( $hook, array( $this, 'output_quickview_button_action' ));
		add_action( 'woocommerce_after_shop_loop_item', array( $this, 'output_quickview_content_action' ));

		add_action( 'wp_footer', array( $this, 'output_options' ) );
		add_action( 'wp_enqueue_scripts',  array( $this, 'enqueue_scripts' ) );
	}

	function output_quickview_button_action() {

		$options = $this->get_options();
		$this->output_quickview_button( $options );
	}

	function output_quickview_content_action() {

		$options = $this->get_options();
		$this->output_quickview_content( false, $options );
	}

	function output_options() {

		$options = $this->get_options();

		$code = '';

		/**
		 * quick view button options
		 */
		$code .= '<div id="wonderwooquickview_options"';
		$code .= ' data-quickviewpos="' . $options['quickviewpos'] . '"';
		$code .= ' data-overimagepos="' . $options['overimagepos'] . '"';
		$code .= ' data-showonhover="' . $options['showonhover'] . '"';
		$code .= ' data-alwaysshowontouch="' . $options['alwaysshowontouch'] . '"';
		$code .= ' data-viewcartnewtab="' . $options['viewcartnewtab'] . '"';
		$code .= ' data-closeafteraddtocart="' . $options['closeafteraddtocart'] . '"';
		$code .= '></div>';

		$code .= $this->get_lightbox_options();

		echo $code;
	}

	function get_lightbox_options() {

		$options = $this->get_options();
		
		$code = '';

		/**
		 * lightbox options
		 */
		$code .= '<div id="wonderwooquickview_lightbox_options" data-skinsfoldername="skins/default/"';
		$code .= ' data-jsfolder="' . $this->controller->plugin->plugin_url . 'engine/"';

		if ( !empty( $options['dataoptions'] ) )
		{
			$dataoptions = stripslashes( trim( $options['dataoptions'] ) );
			$code .= ' ' . preg_replace('/(\r\n|\r|\n|\s)+/', ' ', $dataoptions);
		}

		// Lightbox width
		$code .= ' data-defaultwidth=' . $options['width'];

		// Lightbox product navigation arrows
		$code .= ' data-navarrowspos="' . $options['navarrowspos'] . '"';

		// Thumbnail
		$shownavigation = ( ( $this->is_mobile && $options['hidenavigationonmobile'] ) || ( $this->is_ipad && $options['hidenavigationonipad'] ) ) ? false : $options['shownavigation'];
		$code .= ' data-shownavigation="' . ( $shownavigation ? 'true' : 'false' ) . '"';
		$code .= ' data-hidenavdefault="' . ( $options['hidenavdefault'] ? 'true' : 'false' ) . '"';
		$code .= ' data-shownavcontrol="' . ( $options['shownavcontrol'] ? 'true' : 'false' ) . '"';
		$code .= ' data-thumbwidth=' . $options['thumbwidth'];
		$code .= ' data-thumbheight=' . $options['thumbheight'];

		// Modal
		$code .= ' data-closeonoverlay="' . ( $options['closeonoverlay'] ? 'true' : 'false' ) . '"';

		// Lightbox color
		$code .= ' data-closepos="' . $options['closepos'] . '"';
		$code .= ' data-overlaybgcolor="' . $options['overlaybgcolor'] . '"';
		$code .= ' data-bgcolor="' . $options['bgcolor'] . '"';
		$code .= ' data-bordersize=' . $options['bordersize'];

		// Lightbox animation
		$code .= ' data-enteranimation="' . $options['enteranimation'] . '"';
		$code .= ' data-exitanimation="' . $options['exitanimation'] . '"';

		$code .= '></div>';

		return $code;
	}

	function enqueue_scripts() {

		$options = $this->get_options();
		
		if ( $options['addtocartajax'] )
		{
			wp_enqueue_script( 'wc-add-to-cart' );
		}

		$this->output_custom_css_js();
	}

	function output_custom_css_js() {

		$options = $this->get_options();
		
		$custom_css = '';
		
		// quick view button
		if ( $options['quickviewpos'] == 'overimage' )
		{
			$custom_css .= ' .wonder-wooquickview-button { display:none; } ';
		}

		if ( $options['buttoncustom'] )
		{
			$custom_css .= ' .wonder-wooquickview-button {';
			$custom_css .= ' color: ' . $options['buttontextcolor'] . ' !important; ';
			$custom_css .= ' background-color: ' . $options['buttonbgcolor'] . '!important; ';			
			$custom_css .= ' font-size: ' . $options['buttonfontsize'] . 'px !important; ';
			$custom_css .= ' transition: ' . $options['buttontransition'] . ' !important; ';

			if ( $options['buttoncircle'] )
			{
				$custom_css .= ' padding: ' . max( $options['buttonpaddingtopbottom'], $options['buttonpaddingleftright'] ) . 'px !important; ';
				$custom_css .= ' border-radius: 100% !important; ';
			}
			else
			{
				$custom_css .= ' padding: ' . $options['buttonpaddingtopbottom'] . 'px ' . $options['buttonpaddingleftright'] . 'px !important; ';
				$custom_css .= ' border-radius: ' . $options['buttonradius'] . 'px !important; ';
			}

			$custom_css .= ' } ';

			$custom_css .= ' .wonder-wooquickview-button:hover {';
			$custom_css .= ' color: ' . $options['buttonhovertextcolor'] . ' !important; ';
			$custom_css .= ' background-color: ' . $options['buttonhoverbgcolor'] . '!important; ';
			$custom_css .= ' } ';
		}

		// lightbox
		if ( $options['layoutmode'] == 'leftright' )
		{
			$custom_css .= ' .wonder-wooquickview-content-gallery { float:left !important; width:' . $options['leftpercent'] . '% !important; } ';
			$custom_css .= ' .wonder-wooquickview-content-summary { float:right !important; width:' . (100 - (int) $options['leftpercent']) . '% !important; } ';

			$custom_css .= ' @media screen and (max-width:' . $options['smallscreensize'] . 'px) { ';
			$custom_css .= ' .wonder-wooquickview-content-gallery, .wonder-wooquickview-content-summary { float:none !important; width:100% !important; clear:both !important; } ';
			$custom_css .= ' } ';
		}
		else
		{
			$custom_css .= '.wonder-wooquickview-content-gallery, .wonder-wooquickview-content-summary { float:none !important; width:100% !important; clear:both !important; }';
		}
		
		$custom_css .= '.wonder-wooquickview-content-summary { padding:' . $options['summarypadding'] . 'px !important;}';
		$custom_css .= '.wonder-wooquickview-content-slider .flex-control-thumbs li { padding: ' . $options['thumbpadding'] . 'px !important; width: ' . 100 / $options['thumbcolumn'] . '% !important; }';
		
		$custom_css .= '.wonder-wooquickview-fulldetails { font-size:' . $options['fulldetailsfontsize'] . 'px;}';

		if ( !empty( $options['customcss'] ) )
		{
			$css = stripslashes( trim( $options['customcss'] ) );
			$custom_css .= ' ' . preg_replace( '/(\r\n|\r|\n|\s)+/', ' ', $css );
		}

		wp_add_inline_style( 'wonderplugin-wooquickview', $custom_css );

		if ( !empty( $options['customjs'] ) )
		{
			$customjs = ' ' . preg_replace( '/(\r\n|\r|\n|\s)+/', ' ', stripslashes( trim( $options['customjs'] ) ) );
			wp_add_inline_script( 'wonderplugin-wooquickview', $customjs );
		}
	}

	function output_quickview_button( $options ) {
		
		global $product;

		echo '<a class="wonderwoolightbox wonder-wooquickview-button';
		
		if ( !empty( $options['buttonclass'] ) )
			echo ' ' . $options['buttonclass'];
		
		echo '"';
		
		echo ' href="#wonder-wooquickview-lightbox-' . get_the_id() . '"';
		
		if ( $options['showgroup'] ) { 
			echo ' data-group="wonderwooquickview"';
		}
		
		$shownavigation = ( ( $this->is_mobile && $options['hidenavigationonmobile'] ) || ( $this->is_ipad && $options['hidenavigationonipad'] ) ) ? false : $options['shownavigation'];

		if ( $shownavigation ) {

			$image_id = $product->get_image_id();

			if ( $image_id )
			{
				$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
				$thumbnail_size = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
				$thumbnail_src = wp_get_attachment_image_src( $image_id, $thumbnail_size );
				echo ' data-thumbnail="' . esc_url( $thumbnail_src[0] ) . '"';
			}
		}

		echo '>';

		echo stripslashes( $options['buttoncaption'] );

		echo '</a>';
	}

	function output_quickview_content( $show, $options ) {

		?>
		<div class="wonder-wooquickview-lightbox" id="wonder-wooquickview-lightbox-<?php echo get_the_id(); ?>" style="display:<?php echo $show ? 'block' : 'none'; ?>;">
			<div id="wonder-wooquickview-content-<?php echo get_the_id(); ?>" class="wonder-wooquickview-content woocommerce single-product">
				<div id="product-<?php echo get_the_id(); ?>" class="wonder-wooquickview-product">
				
					<div class="wonder-wooquickview-content-gallery">
						<div class="wonder-wooquickview-content-slider">
							<?php $this->output_quickview_gallery_content( $options ); ?>
						</div>
					</div>
				
					<div class="wonder-wooquickview-content-summary summary entry-summary">
						<div class="summary-content">
							<?php $this->output_quickview_summary_content( $options ); ?>
						</div>
					</div>
					
					<?php if ( $this->controller->plugin->plugin_license_type == 'T' ) { ?>
					<div class="wonderplugin-engine"><a href="https://www.wonderplugin.com/woocommerce-quick-view" title="WooCommerce Quick View">WooCommerce Quick View</a></div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php
	}

	function output_quickview_gallery_content( $options ) {

		if ( $options['showsaleflash'] ) 
		{
			echo '<div class="wonder-wooquickview-saleflash">';
			woocommerce_show_product_sale_flash();
			echo '</div>';

		}

		if ( $options['showgallery'] )
		{
			echo '<div class="wonder-wooquickview-gallery">';
			$this->output_quickview_images( $options );
			echo '</div>';
		}	
	}

	function output_quickview_images( $options ) {

		global $product;

		$image_id = $product->get_image_id();
		$attachment_ids = $product->get_gallery_image_ids();
		
		if ( $image_id || $attachment_ids)
		{
			$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
			$thumbnail_size = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
			$full_size = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );

			?> <ul class="slides"> <?php

			if ( $image_id )
			{
				$thumbnail_src = wp_get_attachment_image_src( $image_id, $thumbnail_size );
				$full_src = wp_get_attachment_image_src( $image_id, $full_size );
				?>
				<li data-thumb="<?php echo esc_url( $thumbnail_src[0] ); ?>">
					<img src="<?php echo esc_url( $full_src[0] ); ?>">
				</li>
				<?php
			}

			if ( $attachment_ids ) 
			{	
				foreach ( $attachment_ids as $attachment_id ) 
				{
					$thumbnail_src = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
					$full_src = wp_get_attachment_image_src( $attachment_id, $full_size );
					?>
					<li data-thumb="<?php echo esc_url( $thumbnail_src[0] ); ?>">
						<img src="<?php echo esc_url( $full_src[0] ); ?>">
					</li>
					<?php
				}
			}
			 
			?> </ul> <?php
		}
	}

	function get_summary_option_caption() {

		return array(
			'title'	=> 'Show Title',
			'rating'	=> 'Show Ratings',
			'price'	=> 'Show Price',
			'excerpt'	=> 'Show Excerpt',
			'addtocart'	=> 'Show Add to Cart Button',
			'meta'	=> 'Show Meta',
			'sharing'	=> 'Show Social Media'
		);
	}

	function output_quickview_summary_content( $options ) {

		global $woocommerce, $product;

		$orders = explode( ',' , $options['contentorder'] );
		foreach( $orders as $order )
		{
			switch( $order ) {
				case 'title':
					if ( $options['showtitle'] ) 
					{
						echo '<div class="wonder-wooquickview-title">';
						woocommerce_template_single_title();
						echo '</div>';
					}	
					break;
				case 'rating':
					if ( $options['showrating'] ) 
					{
						echo '<div class="wonder-wooquickview-rating">';
						woocommerce_template_single_rating();
						echo '</div>';
					}
					break;
				case 'price':
					if ( $options['showprice'] ) 
					{
						echo '<div class="wonder-wooquickview-price">';
						woocommerce_template_single_price();
						echo '</div>';
					}
					break;
				case 'excerpt':
					if ( $options['showexcerpt'] ) 
					{
						echo '<div class="wonder-wooquickview-excerpt">';
						woocommerce_template_single_excerpt();
						echo '</div>';
					}	
					break;
				case 'addtocart':
					if ( $options['showaddtocart'] ) 
					{
						$ajax = $options['addtocartajax'] && ( $product->get_type() != 'external' );
						$is_simple = $product->get_type() == 'simple';
						
						echo '<div class="wonder-wooquickview-addtocart' . ( $ajax  ? ' wonder-wooquickview-addtocart-ajax' : '') . ( $is_simple ? ' wonder-wooquickview-addtocart-simple' : ''). '">';
						woocommerce_template_single_add_to_cart();
						echo '</div>';
					}	
					break;
				case 'meta':
					if ( $options['showmeta'] ) 
					{
						echo '<div class="wonder-wooquickview-meta">';
						woocommerce_template_single_meta();
						echo '</div>';
					}	
					break;
				case 'sharing':
					if ( $options['showsharing'] ) 
					{
						echo '<div class="wonder-wooquickview-sharing">';
						woocommerce_template_single_sharing();
						echo '</div>';
					}	
					break;
				case 'fulldetails':
					if ( $options['showfulldetails'] ) 
					{
						echo '<div class="wonder-wooquickview-fulldetails">';
						echo '<a' . ( $options['fulldetailsnewtab'] ? ' target="_blank"' : '' ) . ' href="' . $product->get_permalink() . '">' . $options['fulldetailscaption'] . '</a>';
						echo '</div>';
					}	
					break;
			} 
		}	
	}

	function save_options( $options ) {

		update_option( 'wonderplugin_wooquickview_options', $options );
	}

	function get_options() {

		$defaults = $this->get_default_options();
		$options = get_option( 'wonderplugin_wooquickview_options', array() );
				
		return array_merge( $defaults, $options );
	}

	function get_default_options() {

		$defaults = array(

			'enable'			=> 1,
			'enablemobile'		=> 1,
			'enableipad'		=> 1,

			// Button position
			'quickviewpos'		=> 'overimage',
			'overimagepos'		=> 'center',
			'showonhover'		=> 0,
			'alwaysshowontouch'	=> 0,

			// Layout
			'width'				=> 960,
			'layoutmode'		=> 'leftright',
			'leftpercent'		=> 50,
			'smallscreensize'	=> 640,

			// Content
			'showsaleflash'		=> 1,
			'showgallery'		=> 1,
			'showtitle'			=> 1,
			'showrating'		=> 1,
			'showprice'			=> 1,
			'showexcerpt'		=> 1,
			'showaddtocart'	=> 1,
			'showmeta'			=> 1,
			'showsharing'		=> 1,
			'showfulldetails'	=> 1,

			'contentorder'		=> 'title,rating,price,excerpt,addtocart,meta,sharing,fulldetails',

			'addtocartajax'		=> 1,
			'fulldetailscaption'		=> 'View Full Details',
			'fulldetailsnewtab'			=> 0,
			'viewcartnewtab'			=> 0,
			'closeafteraddtocart' 		=> 0,
			'fulldetailsfontsize'		=> 16,

			// Button style
			'buttoncaption'				=> 'Quick View',
			'buttonclass' 				=> '',
			'buttoncustom'				=> 1,
			'buttontextcolor'			=> '#ffffff',
			'buttonbgcolor'				=> '#222222',
			'buttonhovertextcolor'		=> '#ffffff',
			'buttonhoverbgcolor'		=> '#555555',
			'buttonpaddingtopbottom'	=> 8,
			'buttonpaddingleftright' 	=> 12,
			'buttonfontsize'			=> 12,
			'buttonradius'				=> 0,
			'buttoncircle'				=> 0,
			'buttontransition'			=> 'all 0.5s ease',

			// lightbox general
			'closeonoverlay'		=> 1,

			// Product navigation arrows
			'showgroup'			=> 0,
			'navarrowspos'		=> 'browserside',

			// lightbox thumbnails
			'shownavigation'			=> 0,
			'hidenavigationonmobile'	=> 1,
			'hidenavigationonipad'		=> 0,
			'shownavcontrol'			=> 1,
			'hidenavdefault'			=> 0,
			'thumbwidth'				=> 96,
			'thumbheight'				=> 72,

			// lightbox color
			'closepos'			=> 'inside',
			'overlaybgcolor'	=> 'rgba(51, 51, 51, 0.9)',
			'bgcolor'			=> '#fff',
			'bordersize'		=> 8,

			// lightbox animation
			'enteranimation'	=> 'zoomIn', 
			'exitanimation'		=> 'fadeOutDown',

			// lightbox content style
			'thumbcolumn'		=> 5,
			'thumbpadding'		=> 0,
			'summarypadding'	=> 20,
			'dataoptions'		=> '',

			// advanced
			'customcss'			=> '',
			'customjs'			=> ''
		);

		return $defaults;
	}

	function output_quickview_content_by_product_id( $product_id, $show, $atts ) {

		global $post;
   
   		$post = get_post( $product_id );
   		setup_postdata( $post );
		
		$options = $this->get_options();
		if ( is_array( $atts ) )
			$options = array_merge( $options, $atts);

		$this->output_quickview_content( $show, $options );

		wp_reset_postdata();
	}

	function xml_cdata( $str ) {

		if ( ! seems_utf8( $str ) ) {
			$str = utf8_encode( $str );
		}

		$str = '<![CDATA[' . str_replace( ']]>', ']]]]><![CDATA[>', $str ) . ']]>';

		return $str;
	}
	
	function wp_check_filetype_and_ext($data, $file, $filename, $mimes) {

		$filetype = wp_check_filetype( $filename, $mimes );
	
		return array(
				'ext'             => $filetype['ext'],
				'type'            => $filetype['type'],
				'proper_filename' => $data['proper_filename']
		);
	}

	function import_xml($post, $files) {

		if (!isset($files['importxml']))
		{
			return array(
					'success' => false,
					'message' => 'No file or invalid file sent.'
			);
		}

		if (!empty($files['importxml']['error']))
		{
			$message = 'XML file error.';

			switch ($files['importxml']['error']) {
				case UPLOAD_ERR_NO_FILE:
					$message = 'No file sent.';
					break;
				case UPLOAD_ERR_INI_SIZE:
				case UPLOAD_ERR_FORM_SIZE:
					$message = 'Exceeded filesize limit.';
					break;
			}

			return array(
					'success' => false,
					'message' => $message
			);
		}

		if ($files['importxml']['type'] != 'text/xml')
		{
			return array(
					'success' => false,
					'message' => 'Not an xml file'
			);
		}

		add_filter( 'wp_check_filetype_and_ext', array($this, 'wp_check_filetype_and_ext'), 10, 4 );

		$xmlfile = wp_handle_upload($files['importxml'], array(
			'test_form' => false,
			'mimes' => array('xml' => 'text/xml')
		));

		remove_filter( 'wp_check_filetype_and_ext', array($this, 'wp_check_filetype_and_ext') );

		if ( empty($xmlfile) || !empty( $xmlfile['error'] ) ) {
			return array(
					'success' => false,
					'message' => (!empty($xmlfile) && !empty( $xmlfile['error'] )) ? $xmlfile['error']: 'Invalid xml file'
			);
		}

		$content = file_get_contents($xmlfile['file']);

		$xmlparser = xml_parser_create();
		xml_parser_set_option($xmlparser, XML_OPTION_CASE_FOLDING, 0);
		xml_parse_into_struct($xmlparser, $content, $values, $index);
		xml_parser_free($xmlparser);

		if ( empty($index) || empty($index['WONDERPLUGIN_WOOQUICKVIEW']) )
		{
			return array(
					'success' => false,
					'message' => 'Not an Exported Wonder WooCommerce Quick View XML File'
			);
		}

		$options = array();

		foreach( $values as $value )
		{
			if ( $value['level'] == 2 )
			{
				if ( empty($value['value']) )
					$opt = '';
				else
					$opt = $value['value'];

				$options[ $value['tag'] ] = $opt;
			}
		}
		
		$default = $this->get_default_options();
		$options = array_merge($default, $options);

		update_option( 'wonderplugin_wooquickview_options', $options );

		return array(
			'success' => true,
			'message' => 'WooCommerce Quick View Options Imported'
		);
	}

	function export_xml() {

		$data = $this->get_options();
		unset($data['wonderplugin-wooquickview-save-options']);

		$filename = 'wonderplugin_wooquickview_export.xml';

		header('Content-Description: File Transfer');
		header("Content-Disposition: attachment; filename=" . $filename);
		header('Content-Type: text/xml; charset=' . get_option( 'blog_charset' ), true);
		header("Cache-Control: no-cache, no-store, must-revalidate");
		header("Pragma: no-cache");
		header("Expires: 0");
		$output = fopen("php://output", "w");

		echo '<?xml version="1.0" encoding="' . get_bloginfo('charset') . "\" ?>\n";
		echo "<WONDERPLUGIN_WOOQUICKVIEW>\r\n";
		foreach($data as $key => $value)
		{				
			echo "<" . $key . ">" . $this->xml_cdata($value) . "</" . $key . ">\r\n";
		}
		echo '</WONDERPLUGIN_WOOQUICKVIEW>';

		fclose($output);
		exit;
	}
}