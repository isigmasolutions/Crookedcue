<?php 

if ( ! defined( 'ABSPATH' ) )
	exit;
	
class WonderPlugin_WooQuickView_View {

	private $controller;
	
	function __construct($controller) {
		
		$this->controller = $controller;
	}

	function show_options() {
	?>
		<div class='wrap'>			

		<?php $this->controller->output_lightbox_options(); ?>

		<?php
			$initd_option = 'wonderplugin_wooquickview_initd';
			$initd = get_option($initd_option);
			if ($initd == false)
			{
				update_option($initd_option, time());
				$initd = time();
			}	
		?>
		<div id="<?php echo $initd_option; ?>" style="display:none;"><?php echo $initd; ?></div>

		<?php 
			$default_options = $this->controller->get_default_options();
			echo '<div id="wonderplugin-wooquickview-default-options" style="display:none;">' . json_encode( $default_options ) . '</div>';
		?>

		<h2><?php echo __( 'WooCommerce Quick View', 'wonderplugin' ) . ' ' . $this->controller->plugin->plugin_license_name . __( ' Version ', 'wonderplugin' ) . $this->controller->plugin->plugin_version; ?> </h2>

		<?php
		if ( isset($_POST['wonderplugin-wooquickview-save-options']) && check_admin_referer('wonderplugin-wooquickview', 'wonderplugin-wooquickview-options') )
		{
			unset( $_POST['wonderplugin-wooquickview-options'] );
			unset( $_POST['_wp_http_referer'] );
			$this->controller->save_options( $_POST );
			echo '<div class="wonderplugin-saved updated"><p>Options saved</p></div>';
		}
		$options = $this->controller->get_options();		
		?>

		<form method="post">

		<?php wp_nonce_field( 'wonderplugin-wooquickview', 'wonderplugin-wooquickview-options' ); ?>

		<ul class="wonderplugin-tab-buttons-horizontal" data-panelsid="wonderplugin-wooquickview-options-panels">
			<li class="wonderplugin-tab-button-horizontal wonderplugin-tab-button-horizontal-selected"><?php _e( 'General', 'wonderplugin' ); ?></li>
			<li class="wonderplugin-tab-button-horizontal"></span><?php _e( 'Content', 'wonderplugin' ); ?></li>
			<li class="wonderplugin-tab-button-horizontal"></span><?php _e( 'Quick View Button Style', 'wonderplugin' ); ?></li>
			<li class="wonderplugin-tab-button-horizontal"></span><?php _e( 'Lightbox Style', 'wonderplugin' ); ?></li>
			<li class="wonderplugin-tab-button-horizontal"></span><?php _e( 'Advanced', 'wonderplugin' ); ?></li>
		</ul>

		<ul class="wonderplugin-tabs-horizontal" id="wonderplugin-wooquickview-options-panels">
        	<li class="wonderplugin-tab-horizontal wonderplugin-tab-horizontal-selected">
				<h3>General Options</h3>
				<table class="form-table">

				<tr>
				<th><?php _e( 'Enable Quick View', 'wonderplugin' ); ?></th>
				<td>
					<label><input type="hidden" value="0" name="enable"><input name="enable" type="checkbox" value="1" <?php if ( $options['enable'] ) echo 'checked'; ?>> <?php _e( 'Add Quick View Button', 'wonderplugin' ); ?></label>
				</td>
				</tr>

				<tr>
				<th></th>
				<td>
					<label><input type="hidden" value="0" name="enablemobile"><input name="enablemobile" type="checkbox" value="1" <?php if ( $options['enablemobile'] ) echo 'checked'; ?>> <?php _e( 'Add Quick View Button on iPhone and Android Devices', 'wonderplugin' ); ?></label>
					<p><label><input type="hidden" value="0" name="enableipad"><input name="enableipad" type="checkbox" value="1" <?php if ( $options['enableipad'] ) echo 'checked'; ?>> <?php _e( 'Add Quick View Button on iPad', 'wonderplugin' ); ?></label></p>
				</td>
				</tr>

				<tr>
				<th><?php _e( 'Quick View Button Position', 'wonderplugin' ); ?></th>
				<td>
					<select name="quickviewpos">
						<option value="beforeitem" <?php if ( $options['quickviewpos'] == 'beforeitem' ) echo 'selected'; ?>><?php _e( 'Before Product Image', 'wonderplugin' ); ?></option>
						<option value="overimage" <?php if ( $options['quickviewpos'] == 'overimage' ) echo 'selected'; ?>><?php _e( 'On Top of Product Image', 'wonderplugin' ); ?></option>
						<option value="beforetitle" <?php if ( $options['quickviewpos'] == 'beforetitle' ) echo 'selected'; ?>><?php _e( 'Before Product Name', 'wonderplugin' ); ?></option>
						<option value="aftertitle" <?php if ( $options['quickviewpos'] == 'aftertitle' ) echo 'selected'; ?>><?php _e( 'After Product Name', 'wonderplugin' ); ?></option>
						<option value="beforecart" <?php if ( $options['quickviewpos'] == 'beforecart' ) echo 'selected'; ?>><?php _e( 'Before Add to Cart Button', 'wonderplugin' ); ?></option>
						<option value="aftercart" <?php if ( $options['quickviewpos'] == 'aftercart' ) echo 'selected'; ?>><?php _e( 'After Add to Cart Button', 'wonderplugin' ); ?></option>
					</select>
				</td>
				</tr>

				<tr class="quickviewpos-options">
				<th></th>
				<td>
					<label><?php _e( 'Position of Quick View Button when When On Top of Product Image:', 'wonderplugin' ); ?> <select name="overimagepos">
						<option value="center" <?php if ( $options['overimagepos'] == 'center' ) echo 'selected'; ?>><?php _e( 'Center of Image', 'wonderplugin' ); ?></option>
						<option value="topleft" <?php if ( $options['overimagepos'] == 'topleft' ) echo 'selected'; ?>><?php _e( 'Top Left of Image', 'wonderplugin' ); ?></option>
						<option value="topright" <?php if ( $options['overimagepos'] == 'topright' ) echo 'selected'; ?>><?php _e( 'Top Right of Image', 'wonderplugin' ); ?></option>
						<option value="bottomleft" <?php if ( $options['overimagepos'] == 'bottomleft' ) echo 'selected'; ?>><?php _e( 'Bottom Left of Image', 'wonderplugin' ); ?></option>
						<option value="bottomright" <?php if ( $options['overimagepos'] == 'bottomright' ) echo 'selected'; ?>><?php _e( 'Bottom Right of Image', 'wonderplugin' ); ?></option>
					</select></label>
					<p><label><input type="hidden" value="0" name="showonhover"><input name="showonhover" type="checkbox" value="1" <?php if ( $options['showonhover'] ) echo 'checked'; ?>> <?php _e( 'Only Show the Button on Mouse Hover Over', 'wonderplugin' ); ?></label></p>
					<p><label><input type="hidden" value="0" name="alwaysshowontouch"><input name="alwaysshowontouch" type="checkbox" value="1" <?php if ( $options['alwaysshowontouch'] ) echo 'checked'; ?>> <?php _e( 'Always Show the Button on Mobile and Tablet Devices', 'wonderplugin' ); ?></label></p>
				</td>
				</tr>

				</table>
				
				<h3><?php _e( 'Layout Options', 'wonderplugin' ); ?></h3>
				<table class="form-table">

				<tr>
				<th><?php _e( 'Lightbox Width', 'wonderplugin' ); ?></th>
				<td>
					<label><input name="width" type="number" min="1" class="small-text" value="<?php echo $options['width']; ?>"> px</label>
				</td>
				</tr>

				<tr>
				<th><?php _e( 'Layout Mode', 'wonderplugin' ); ?></th>
				<td>
					<select name="layoutmode">
						<option value="leftright" <?php if ( $options['layoutmode'] == 'leftright' ) echo 'selected'; ?>><?php _e( 'Product Gallery on Left, Summary on Right', 'wonderplugin' ); ?></option>
						<option value="topbottom" <?php if ( $options['layoutmode'] == 'topbottom' ) echo 'selected'; ?>><?php _e( 'Product Gallery on Top, Summary on Bottom', 'wonderplugin' ); ?></option>
					</select>
				</td>
				</tr>

				<tr class="layoutmode-options">
				<th></th>
				<td>
					<label><?php _e( 'Photo Gallery Width:', 'wonderplugin' ); ?> <input name="leftpercent" type="number" min="1" max="99" class="small-text" value="<?php echo $options['leftpercent']; ?>"> %</label>
					<p><label><?php _e( 'Switch to Top/Bottom Layout When screen width is less than:', 'wonderplugin' ); ?> <input name="smallscreensize" type="number" min="1" class="small-text" value="<?php echo $options['smallscreensize']; ?>"> px</label></p>
				</td>
				</tr>

				</table>
				
			</li>

			<li class="wonderplugin-tab-horizontal">

				<h3><?php _e( 'Gallery Content', 'wonderplugin' ); ?></h3>
				<table class="form-table">

				<tr>
				<th>Content</th>
				<td>
					<p><label><input type="hidden" value="0" name="showsaleflash"><input name="showsaleflash" type="checkbox" value="1" <?php if ( $options['showsaleflash'] ) echo 'checked'; ?>> <?php _e( 'Show Sale Flash', 'wonderplugin' ); ?></label></p>
					<p><label><input type="hidden" value="0" name="showgallery"><input name="showgallery" type="checkbox" value="1" <?php if ( $options['showgallery'] ) echo 'checked'; ?>> <?php _e( 'Show Gallery', 'wonderplugin' ); ?></label></p>
				</td>
				</tr>
				</table>

				<h3><?php _e( 'Summary Content', 'wonderplugin' ); ?></h3>
				<table class="form-table">

				<tr>
				<th><?php _e( 'Content ( Drag and Drop the Icon to Adjust Order )', 'wonderplugin' ); ?></th>
				<td>
					<input type="hidden" value="<?php echo $options['contentorder']; ?>" name="contentorder">
					<ul class="wonderplugin-wooquickview-summary-content">
						<?php 
						$captions = array(
							'title'			=> 'Show Title',
							'rating'		=> 'Show Ratings',
							'price'			=> 'Show Price',
							'excerpt'		=> 'Show Excerpt',
							'addtocart'		=> 'Show Add to Cart Button',
							'meta'			=> 'Show Meta',
							'sharing'		=> 'Show Social Media',
							'fulldetails' 	=> 'Show Full Details Link'
						);
						$orders = explode( ',' , $options['contentorder'] );
						foreach( $orders as $order )
						{
						?>
						<li data-option="<?php echo $order; ?>">
						<i class="wonderplugin-wooquickview-summary-option-dragdrop dashicons dashicons-menu"></i>
						<input type="hidden" value="0" name="show<?php echo $order; ?>">
						<label><input name="show<?php echo $order; ?>" type="checkbox" value="1" <?php if ( $options['show' . $order] ) echo 'checked'; ?>> <?php echo $captions[$order]; ?></label></li>
						<?php
						}
						foreach($captions as $key => $title)
						{
							if ( !in_array($key, $orders) )
							{
								?>
								<li data-option="<?php echo $key; ?>">
								<i class="wonderplugin-wooquickview-summary-option-dragdrop dashicons dashicons-menu"></i>
								<input type="hidden" value="0" name="show<?php echo $key; ?>">
								<label><input name="show<?php echo $key; ?>" type="checkbox" value="1"> <?php echo $captions[$key]; ?></label></li>
								<?php
							}
						}
						?>					
					</ul>
				</td>
				</tr>
				</table>

				<h3><?php _e( 'Content Options', 'wonderplugin' ); ?></h3>
				<table class="form-table">
				<tr>
				<th><?php _e( 'Add to Cart via Ajax', 'wonderplugin' ); ?></th>
				<td>
				<label><input type="hidden" value="0" name="addtocartajax"><input name="addtocartajax" type="checkbox" value="1" <?php if ( $options['addtocartajax'] ) echo 'checked'; ?>> <?php _e( 'Enable Ajax for Add to Cart Button', 'wonderplugin' ); ?></label>
				<p><label><input type="hidden" value="0" name="closeafteraddtocart"><input name="closeafteraddtocart" type="checkbox" value="1" <?php if ( $options['closeafteraddtocart'] ) echo 'checked'; ?>> <?php _e( 'Close the Quick View After Added to Cart', 'wonderplugin' ); ?></label></p>
				<p><label><input type="hidden" value="0" name="viewcartnewtab"><input name="viewcartnewtab" type="checkbox" value="1" <?php if ( $options['viewcartnewtab'] ) echo 'checked'; ?>> <?php _e( 'Open View Cart Page in a New Window or Tab', 'wonderplugin' ); ?></label></p>
				</td>
				</tr>

				<tr>
				<th><?php _e( 'Full Details Link', 'wonderplugin' ); ?></th>
				<td>
				<?php _e( 'Link Text:', 'wonderplugin' ); ?>
				<p><input type="text" name="fulldetailscaption" class="large-text" value="<?php echo esc_html( stripslashes( $options['fulldetailscaption'] ) ); ?>"></p>
				<p><?php _e( 'Font Size:', 'wonderplugin' ); ?> <input type="number" name="fulldetailsfontsize" class="small-text" value="<?php echo $options['fulldetailsfontsize']; ?>"> px</p>
				<p><label><input type="hidden" value="0" name="fulldetailsnewtab"><input name="fulldetailsnewtab" type="checkbox" value="1" <?php if ( $options['fulldetailsnewtab'] ) echo 'checked'; ?>> <?php _e( 'Open Product Full Details Page in a New Window or Tab', 'wonderplugin' ); ?></label></p>
				</td>
				</tr>
				
				</table>

				<h3><?php _e( 'Style Options', 'wonderplugin' ); ?></h3>
				<table class="form-table">
					<tr>
					<th><?php _e( 'Photo Gallery Thumbnail Column:', 'wonderplugin' ); ?></th>
					<td>
						<input type="number" name="thumbcolumn" class="small-text" value="<?php echo $options['thumbcolumn']; ?>">
					</td>
					</tr>	

					<tr>
					<th><?php _e( 'Photo Gallery Thumbnail Padding:', 'wonderplugin' ); ?></th>
					<td>
						<input type="number" name="thumbpadding" class="small-text" value="<?php echo $options['thumbpadding']; ?>">
					</td>
					</tr>	

					<tr>
					<th><?php _e( 'Summary Padding:', 'wonderplugin' ); ?></th>
					<td>
						<input type="number" name="summarypadding" class="small-text" value="<?php echo $options['summarypadding']; ?>"> px
					</td>
					</tr>

				</table>

			</li>

			<li class="wonderplugin-tab-horizontal">
				
				<h3><?php _e( 'Button Caption', 'wonderplugin' ); ?></h3>
				<table class="form-table">

					<tr>
					<th><?php _e( 'Button Caption', 'wonderplugin' ); ?></th>
					<td>
						<input type="text" name="buttoncaption" class="large-text" value="<?php echo esc_html( stripslashes( $options['buttoncaption'] ) ); ?>">
						<p><input type="button" id="buttoncaption-selecticon" class="button" value="Select Icon"  /></p>
					</td>
					</tr>
				
				</table>

				<h3><?php _e( 'Button Style', 'wonderplugin' ); ?></h3>
				<table class="form-table">

					<tr>
					<th><?php _e( 'Add Button CSS Class Name(s)', 'wonderplugin' ); ?></th>
					<td>
						<input type="text" name="buttonclass" class="large-text" value="<?php echo $options['buttonclass']; ?>">
					</td>
					</tr>

					<tr>
					<th><?php _e( 'Customize Button', 'wonderplugin' ); ?></th>
					<td>
						<label><input type="hidden" value="0" name="buttoncustom"><input name="buttoncustom" type="checkbox" value="1" <?php if ( $options['buttoncustom'] ) echo 'checked'; ?> > <?php _e( 'Custom Button', 'wonderplugin' ); ?></label>
					</td>
					</tr>

					<tr class="buttoncustom-options">
					<th><?php _e( 'Text Color:', 'wonderplugin' ); ?></th>
					<td>
						<input type="text" name="buttontextcolor" class="wonderplugin-colorpicker medium-text" value="<?php echo $options['buttontextcolor']; ?>">
					</td>
					</tr>

					<tr class="buttoncustom-options">
					<th><?php _e( 'Background Color:', 'wonderplugin' ); ?></th>
					<td>
						<input type="text" name="buttonbgcolor" class="wonderplugin-colorpicker medium-text" value="<?php echo $options['buttonbgcolor']; ?>">
					</td>
					</tr>

					<tr class="buttoncustom-options">
					<th><?php _e( 'Hover Text Color:', 'wonderplugin' ); ?></th>
					<td>
						<input type="text" name="buttonhovertextcolor" class="wonderplugin-colorpicker medium-text" value="<?php echo $options['buttonhovertextcolor']; ?>">
					</td>
					</tr>

					<tr class="buttoncustom-options">
					<th><?php _e( 'Hover Background Color:', 'wonderplugin' ); ?></th>
					<td>
						<input type="text" name="buttonhoverbgcolor" class="wonderplugin-colorpicker medium-text" value="<?php echo $options['buttonhoverbgcolor']; ?>">
					</td>
					</tr>

					<tr class="buttoncustom-options">
					<th><?php _e( 'Font Size:', 'wonderplugin' ); ?></th>
					<td>
						<input type="number" name="buttonfontsize" class="small-text" value="<?php echo $options['buttonfontsize']; ?>"> px
					</td>
					</tr>

					<tr class="buttoncustom-options">
					<th><?php _e( 'Button Top/Bottom Padding:', 'wonderplugin' ); ?></th>
					<td>
						<input type="number" name="buttonpaddingtopbottom" class="small-text" value="<?php echo $options['buttonpaddingtopbottom']; ?>"> px
					</td>
					</tr>

					<tr class="buttoncustom-options">
					<th><?php _e( 'Button Left/Right Padding:', 'wonderplugin' ); ?></th>
					<td>
						<input type="number" name="buttonpaddingleftright" class="small-text" value="<?php echo $options['buttonpaddingleftright']; ?>"> px
					</td>
					</tr>

					<tr class="buttoncustom-options">
					<th><?php _e( 'Border Radius:', 'wonderplugin' ); ?></th>
					<td>
						<input type="number" name="buttonradius" class="small-text" value="<?php echo $options['buttonradius']; ?>"> px
						<p><label><input type="hidden" value="0" name="buttoncircle"><input name="buttoncircle" type="checkbox" value="1" <?php if ( $options['buttoncircle'] ) echo 'checked'; ?> > <?php _e( 'Display as Circle for Icon', 'wonderplugin' ); ?></label></p>
					</td>
					</tr>

					<tr class="buttoncustom-options">
					<th><?php _e( 'Border CSS Transition:', 'wonderplugin' ); ?></th>
					<td>
						<input type="text" name="buttontransition" class="medium-text" value="<?php echo $options['buttontransition']; ?>">
					</td>
					</tr>

				</table>

			</li>

			<li class="wonderplugin-tab-horizontal">

				<h3><?php _e( 'Lightbox General Options', 'wonderplugin' ); ?></h3>
				<table class="form-table">

					<tr>
					<th><?php _e( 'Modal Mode', 'wonderplugin' ); ?></th>
					<td>
						<label><input type="hidden" value="0" name="closeonoverlay"><input name="closeonoverlay" type="checkbox" value="1" <?php if ( $options['closeonoverlay'] ) echo 'checked'; ?>> <?php _e( 'Close the Lightbox when Clicking on Background Overlay', 'wonderplugin' ); ?></label>
					</td>
					</tr>

				</table>

				<h3><?php _e( 'Product Navigation', 'wonderplugin' ); ?></h3>
				<table class="form-table">
					
					<tr>
					<th><?php _e( 'Product Navigation', 'wonderplugin' ); ?></th>
					<td>
						<label><input type="hidden" value="0" name="showgroup"><input name="showgroup" type="checkbox" value="1" <?php if ( $options['showgroup'] ) echo 'checked'; ?>> <?php _e( 'Enable Product Navigation', 'wonderplugin' ); ?></label>
					</td>
					</tr>

					<tr class="showgroup-options">
					<th></th>
					<td>
						<label><?php _e( 'Navigation Arrows Position:', 'wonderplugin' ); ?> <select name="navarrowspos">
							<option value="side" <?php if ( $options['navarrowspos'] == 'side' ) echo 'selected'; ?>><?php _e( 'Outside of Lightbox', 'wonderplugin' ); ?></option>
							<option value="browserside" <?php if ( $options['navarrowspos'] == 'browserside' ) echo 'selected'; ?>><?php _e( 'On Sides of Web Browser', 'wonderplugin' ); ?></option>
						</select></label>
					</td>
					</tr>

					<tr class="showgroup-options">
					<th><?php _e( 'Thumbnail Carousel', 'wonderplugin' ); ?></th>
					<td>
						<label><input type="hidden" value="0" name="shownavigation"><input name="shownavigation" type="checkbox" value="1" <?php if ( $options['shownavigation'] ) echo 'checked'; ?>> <?php _e( 'Show Thumbnail Carousel Navigation under the Lightbox', 'wonderplugin' ); ?></label>
					</td>
					</tr>

					<tr class="showgroup-options shownavigation-options">
					<th></th>
					<td>
						<?php _e( 'Thumbnail Size (px):', 'wonderplugin' ); ?> <input type="number" name="thumbwidth" class="small-text" value="<?php echo $options['thumbwidth']; ?>"> by <input type="number" name="thumbheight" class="small-text" value="<?php echo $options['thumbheight']; ?>">
					</td>
					</tr>

					<tr class="showgroup-options shownavigation-options">
					<th></th>
					<td>
						<label><input type="hidden" value="0" name="hidenavigationonmobile"><input name="hidenavigationonmobile" type="checkbox" value="1" <?php if ( $options['hidenavigationonmobile'] ) echo 'checked'; ?>> <?php _e( 'Hide Thumbnail Carousel Navigation on iPhone and Android', 'wonderplugin' ); ?></label>
						<p><label><input type="hidden" value="0" name="hidenavigationonipad"><input name="hidenavigationonipad" type="checkbox" value="1" <?php if ( $options['hidenavigationonipad'] ) echo 'checked'; ?>> <?php _e( 'Hide Thumbnail Carousel Navigation on iPad', 'wonderplugin' ); ?></label></p>
					</td>
					</tr>

					<tr class="showgroup-options shownavigation-options">
					<th></th>
					<td>
						<label><input type="hidden" value="0" name="shownavcontrol"><input name="shownavcontrol" type="checkbox" value="1" <?php if ( $options['shownavcontrol'] ) echo 'checked'; ?>> <?php _e( 'Show a Button to Show/Hide Thumbnail Carousel', 'wonderplugin' ); ?></label>
						<p><label><input type="hidden" value="0" name="hidenavdefault"><input name="hidenavdefault" type="checkbox" value="1" <?php if ( $options['hidenavdefault'] ) echo 'checked'; ?>> <?php _e( 'Hide Thumbnail Carousel Navigation by default', 'wonderplugin' ); ?></label></p>
					</td>
					</tr>

				</table>

				<h3><?php _e( 'Lightbox Color and Border', 'wonderplugin' ); ?></h3>
				<table class="form-table">

					<tr>
					<th><?php _e( 'Background Overlay Color:', 'wonderplugin' ); ?></th>
					<td>
						<input type="text" name="overlaybgcolor" class="wonderplugin-colorpicker medium-text" value="<?php echo $options['overlaybgcolor']; ?>">
					</td>
					</tr>
					
					<tr>
					<th><?php _e( 'Lightbox Background and Border Color:', 'wonderplugin' ); ?></th>
					<td>
						<input type="text" name="bgcolor" class="wonderplugin-colorpicker medium-text" value="<?php echo $options['bgcolor']; ?>">
					</td>
					</tr>

					<tr>
					<th><?php _e( 'Lightbox Border Size:', 'wonderplugin' ); ?></th>
					<td>
						<input type="number" name="bordersize" class="small-text" value="<?php echo $options['bordersize']; ?>"> px
					</td>
					</tr>
					
					<tr>
					<th><?php _e( 'Close Button Position:', 'wonderplugin' ); ?></th>
					<td>
						<select name="closepos">
							<option value="inside" <?php if ( $options['closepos'] == 'inside' ) echo 'selected'; ?>><?php _e( 'Inside Corner of Lightbox', 'wonderplugin' ); ?></option>
							<option value="outside" <?php if ( $options['closepos'] == 'outside' ) echo 'selected'; ?>><?php _e( 'Outside Corner of Lightbox', 'wonderplugin' ); ?></option>
							<option value="topright" <?php if ( $options['closepos'] == 'topright' ) echo 'selected'; ?>><?php _e( 'Top Right Corner of Web Browser', 'wonderplugin' ); ?></option>
						</select>
					</td>
					</tr>

				</table>

				<h3><?php _e( 'Lightbox Animation', 'wonderplugin' ); ?></h3>
				<table class="form-table">
					<tr>
					<th><?php _e( 'Enter Animation:', 'wonderplugin' ); ?></th>
					<td>
						<select name="enteranimation">
						<option value=""<?php echo ($options['enteranimation'] == '') ? ' selected' : ''; ?>>Classic Resizing</option>
						<option value="none"<?php echo ($options['enteranimation'] == 'none') ? ' selected' : ''; ?>>None</option>
						<option value="fadeIn"<?php echo ($options['enteranimation'] == 'fadeIn') ? ' selected' : ''; ?>>Fade In</option>
						<option value="fadeInDown"<?php echo ($options['enteranimation'] == 'fadeInDown') ? ' selected' : ''; ?>>Fade In Down</option>
						<option value="zoomIn"<?php echo ($options['enteranimation'] == 'zoomIn') ? ' selected' : ''; ?>>ZoomIn</option>
						<option value="bounceIn"<?php echo ($options['enteranimation'] == 'bounceIn') ? ' selected' : ''; ?>>Bounce In</option>
						</select>	
					</td>
					</tr>

					<tr>
					<th><?php _e( 'Exit Animation:', 'wonderplugin' ); ?></th>
					<td>
						<select name="exitanimation" id="exitanimation">
						<option value=""<?php echo ($options['exitanimation'] == '') ? ' selected' : ''; ?>>None</option>
						<option value="fadeOut"<?php echo ($options['exitanimation'] == 'fadeOut') ? ' selected' : ''; ?>>Fade Out</option>
						<option value="fadeOutDown"<?php echo ($options['exitanimation'] == 'fadeOutDown') ? ' selected' : ''; ?>>Fade Out Down</option>
						</select>	
					</td>
					</tr>
				</table>
				
				<h3><?php _e( 'Advanced Data Options', 'wonderplugin' ); ?></h3>
				<table class="form-table">
					<tr>
					<th><?php _e( 'Lightbox Data Options:', 'wonderplugin' ); ?></th>
					<td>						
						<textarea name="dataoptions" class="large-text" rows="12"><?php echo stripslashes( $options['dataoptions'] ); ?></textarea>
					</td>
					</tr>
				</table>
			</li>

			<li class="wonderplugin-tab-horizontal">
				<table class="form-table">
					<tr>
					<th><?php _e( 'Custom CSS:', 'wonderplugin' ); ?></th>
					<td>						
						<textarea name="customcss" class="large-text" rows="12"><?php echo stripslashes( $options['customcss'] ); ?></textarea>
					</td>
					</tr>

					<tr>
					<th><?php _e( 'Custom JavaScript:', 'wonderplugin' ); ?></th>
					<td>						
						<textarea name="customjs" class="large-text" rows="12"><?php echo stripslashes( $options['customjs'] ); ?></textarea>
					</td>
					</tr>
				</table>
			</li>
		</ul>

		<input type="submit" name="wonderplugin-wooquickview-save-options" class="button button-primary button-hero" value="Save Changes"  />
		<div style="display:inline;float:right;padding-top:12px;"><a id="reset-wooquickview-options" href="#">Reset to Default Options</a></div>

		</form>

		</div>
	<?php
	}

	function show_tools_tab() {
	?>
		<li class="wonderplugin-tab-button-horizontal"><?php _e( 'Quick View Import/Export', 'wonderplugin' ); ?></li>
	<?php
	}

	function show_tools_panel() {
	?>
		<li class="wonderplugin-tab-horizontal">

			<h3><?php _e( 'Import Options', 'wonderplugin' ); ?></h3>

			<div class="wonderplugin-panel-section">
			<?php if (isset($_POST['wp-import']) && isset($_FILES['importxml']) && check_admin_referer('wonderplugin-wooquickview', 'wonderplugin-wooquickview-import')) {
				$import_return = $this->controller->import_xml($_POST, $_FILES);
			} ?>

			<form method="post" enctype="multipart/form-data">
				<?php wp_nonce_field('wonderplugin-wooquickview', 'wonderplugin-wooquickview-import'); ?>
				<?php if ( isset($import_return) ) {	
					echo '<div class="' . ( $import_return['success'] ? 'wonderplugin-updated' : 'wonderplugin-error' ) . '"><p>' . $import_return['message'] . '</p></div>';
				} ?>

				<p><b><?php _e( 'Choose an exported WooCommerce Quick View Options XML file, then click the Upload File and Import button.', 'wonderplugin' ); ?></b></p>
				<div class='wonderplugin-error wonderplugin-error-message' id="wp-import-error"></div>
				<input type="file" name="importxml" id="wp-importxml" />
				<p><input type="submit" name="wp-import" id="wp-import-submit" class="button button-primary button-hero" value="Upload File and Import" /></p>
			</form>
			</div>

			<h3><?php _e( 'Export Options', 'wonderplugin' ); ?></h3>
			
			<div class="wonderplugin-panel-section">
			<p><b><?php _e( 'Export WooCommerce Quick View Options to an XML file', 'wonderplugin' ); ?></b></p>
			<form method="post" action="<?php echo admin_url('admin-post.php?action=wonderplugin_wooquickview_export'); ?>">
				<?php wp_nonce_field('wonderplugin-wooquickview', 'wonderplugin-wooquickview-export'); ?>
					<p><input type="submit" name="wp-export" class="button button-primary button-hero" value="Click to Export" /></p>
					<?php if ( WP_DEBUG ) { ?>
					<p><?php _e( 'Warning: WP_DEBUG is enabled, the Export function may not work correctly. Please check your WordPress configuration file wp-config.php and change the WP_DEBUG to false.', 'wonderplugin' ); ?></p>
					<?php } ?>
			</form>
			</div>

		</li>
	<?php
	}
}