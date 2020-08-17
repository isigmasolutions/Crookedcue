<?php 

if ( ! defined( 'ABSPATH' ) )
	exit;
	
class WonderPlugin_WooCommerce_Update {

	private $controller, $slug, $version, $api_url, $wp_version, $productlist;
	
	function __construct( $common ) {
		
		global $wp_version;
		
		$this->common = $common;

		// common information
		$this->wp_version = $wp_version;
		$this->domain = ( isset( $_SERVER['SERVER_NAME'] ) ? $_SERVER['SERVER_NAME'] : '' );
		$this->api_url = 'https://www.wonderplugin.com/update-check.php';
		$this->renew_link = 'https://www.wonderplugin.com/renew/';
		$this->manualupdate_link = 'https://www.wonderplugin.com/register-faq/#manualupdate';
		$this->register_page = 'wonderplugin_woocommerce_register';
		$this->key_option_name = 'wonderplugin_account_key';
		
		// product list
		$this->productlist = apply_filters( 'wonderplugin_woocommerce_update_productlist', array() );

		// init
		$settings = $this->common->get_settings();
		$disableupdate = $settings['disableupdate'];

		if ( !$disableupdate )
		{
			$this->init();
		}
	}
	
	function init() {
		
		// check update on every page request, testing mode only
		// set_site_transient('update_plugins', null);
		
		// check for plugin update
		add_filter( 'pre_set_site_transient_update_plugins', array( $this, 'check_for_plugin_update' ) );
			
		// get  plugin information
		add_filter( 'plugins_api', array( $this, 'check_info'), 20, 3 );
		
		// display extra message in plugins page
		$this->productlist = apply_filters( 'wonderplugin_woocommerce_update_productlist', array() );

		foreach( $this->productlist as $product )
		{
			add_action( 'in_plugin_update_message-' . $product->plugin, array( $this, 'show_plugin_update_message' ), 10, 2 );
		}
		
		// admin notice
		add_action( 'admin_notices', array( $this, 'plugin_update_notice' ) );
	}

	function plugin_update_notice() {
		
		$this->productlist = apply_filters( 'wonderplugin_woocommerce_update_productlist', array() );

		foreach ( $this->productlist as $product )
		{

			$info = $this->get_plugin_info( $product );

			if ( !empty($info->notice) )
			{
				echo '<div class="error notice is-dismissible"><p>'. esc_html($info->notice) . '</p></div>';
			}	
					
			global $pagenow;
					
			if( $pagenow === 'update-core.php' && !empty($info))
			{
				if ( !isset($info->key_status) || $info->key_status != 'valid')
				{
					if ( isset($info->key_status) && $info->key_status == 'expired')
					{
						echo '<div class="error notice is-dismissible"><p><strong>' . $info->name . '</strong>: Your free upgrade period has expired. To update the plugin, please <a href="' . $this->renew_link . '" target="_blank">renew your license</a>, otherwise, you will get the <strong>Update package not available</strong> error.</p></div>';
					}
					else
					{
						if ($product->license_type == 'F')
						{
							echo '<div class="error notice is-dismissible"><p><strong>' . $info->name . '</strong>: To update the plugin in WordPress backend, please <a href="' . $product->order_link . '" target="_blank">upgrade to a commercial license</a>, otherwise, you will get the <strong>Update package not available</strong> error.</div>';				
						}
						else
						{
							echo '<div class="error notice is-dismissible"><p><strong>' . $info->name . '</strong>: To update the plugin, please <a href="'. admin_url('admin.php?page=' . $this->register_page) . '">enter your license key</a>, otherwise, you will get the <strong>Update package not available</strong> error.</div>';
						}
					}
				}
			}
		}
	}
	
	/**
	 * 
	 * @param $action: basic_check, register, deregister
	 */
	function get_update_data($product, $action, $key = '', $force = false) {
		
		global $pagenow;
		
		if (($action == 'register' || $action == 'deregister') && empty($key))
			return false;
		
		if( $pagenow === 'update-core.php' && isset( $_GET['force-check'] ) )
			$force = true;
		
		$info = $this->get_plugin_info( $product );
		if (!$force && ($action == 'basic_check') && !empty($info) && isset($info->last_checked) && is_int($info->last_checked) && ((time() - $info->last_checked) < 2 * 60 * 60))
			return $info;
		
		$api_args = array(
			'action'	=> $action,
			'product'	=> $product->product,
			'version' 	=> $product->version,
			'wp_version'=> $this->wp_version,
			'key'		=> $key
		);
		
		if ($action == 'register' || $action == 'deregister')
			$api_args['domain'] = $this->domain;
		
		if ( empty($key) )
		{
			if ( !empty($info->key) )
			{
				$api_args['key'] = $info->key;
			}
			else 
			{
				$api_args['key'] = $this->get_plugin_key();
			}
		}

		$request_params = array(
			'method'	=> 'POST',
			'body'		=> $api_args
		);

		$raw_response = wp_remote_post($this->api_url, $request_params);
		if ( !is_wp_error( $raw_response ) && ($raw_response['response']['code'] == 200) )
		{
			$response = unserialize( $raw_response['body'] );			
			if ( !empty( $response ) )
			{	
				if ($action == 'register' || $action == 'basic_check')
				{
					$response->slug = $product->slug;
					$response->plugin = $product->plugin;	
					$response->last_checked = time();
					$this->save_plugin_info($product, $response);
				}
				return $response;
			}
		}

		return false;
	}
	
	function check_for_plugin_update( $data ) {
				
		if ( empty( $data ) ) 
			return $data;
		
		$this->productlist = apply_filters( 'wonderplugin_woocommerce_update_productlist', array() );

		foreach ( $this->productlist as $product )
		{
			// check for update
			$update_data = $this->get_update_data( $product, 'basic_check' );
							
			if( $update_data === false ) 
				return $data;
					
			// update
			if ( version_compare( $product->version, $update_data->version, '<' ) ) {
				$data->response[$product->plugin] = $update_data;	
			}
		}

		return $data;
	}
	
	function check_info( $data, $action = '', $args = null ) {
				
		if ( $action !== 'plugin_information' || ! isset( $args->slug ) )
			return $data;
		
		$this->productlist = apply_filters( 'wonderplugin_woocommerce_update_productlist', array() );

		$product = null;
		foreach ( $this->productlist as $item )
		{
			if ( $item->slug == $args->slug )
			{
				$product = $item;
				break;
			}
		}

		if ( empty( $product ) )
			return $data;

		$update_data = $this->get_plugin_info( $product );
		if( $update_data === false )
		{			
			$update_data = $this->get_update_data( $product, 'basic_check' );
			if( $update_data === false )
				return $data;
		}
		
		return $update_data;
	}
	
	function show_plugin_update_message( $plugin_data, $r ) {
		
		$this->productlist = apply_filters( 'wonderplugin_woocommerce_update_productlist', array() );

		$product = null;
		foreach ( $this->productlist as $item )
		{
			if ( $item->slug == $plugin_data['slug'] )
			{
				$product = $item;
				break;
			}
		}

		if ( empty($product) )
			return;
		
		$info = $this->get_plugin_info( $product );
				
		if ( isset($info->key_status) && $info->key_status == 'valid')
		{
			if (isset($info->key_expire) && $info->key_expire > 0)
			{
				if ($info->key_expire < 120)
				{
					echo ' Your license key will expire in ' . $info->key_expire . ' days.';
					echo ' To keep the plugin updated, log into the membership area and renew with 50% off discount: <a href="' . $this->renew_link . '" target="_blank">renew your license</a>.';
				}
			}
			return;
		}
		else if ( isset($info->key_status) && $info->key_status == 'expired')
		{
			echo '<br>Your free upgrade period has expired. To get automatic update, please <a href="' . $this->renew_link . '" target="_blank">renew your license</a>.';
		}
		else
		{
			if ($product->license_type == 'F')
			{
				echo '<br>To get automatic update, please <a href="' . $product->order_link . '" target="_blank">upgrade to a commercial license</a>.';
			}
			else
			{
				echo '<br>To get automatic update, please <a href="'. admin_url('admin.php?page=' . $this->register_page) . '">enter your license key</a> or <a href="' . $this->manualupdate_link . '" target="_blank">update the plugin manually</a>.';
			}
		}
	}

	function get_plugin_info( $product ) {
		
		$option_name = $product->info_option_name;

		$info = get_option( $option_name );
		if ($info === false)
			return false;
	
		return unserialize($info);
	}
	
	function save_plugin_info( $product, $info ) {
	
		$option_name = $product->info_option_name;

		if ( !empty($info->key) && ( $info->key_status == 'valid' || $info->key_status == 'expired') )
		{
			update_option( $this->key_option_name, $info->key );
		}
		
		update_option( $option_name, serialize($info) );
	}

	function clear_plugin_key() {

		delete_option( $this->key_option_name );
	}

	function get_plugin_key() {

		return get_option( $this->key_option_name, '' );
	}

	function check_license($product, $options) {
	
		$ret = array(
			"status" => "empty"
		);
	
		if ( !isset($options) || empty($options['wonderplugin-key']) )
		{
			return $ret;
		}
	
		$key = sanitize_text_field( $options['wonderplugin-key'] );
		if ( empty($key) )
			return $ret;
	
		$update_data = $this->get_update_data($product, 'register', $key );
		if( $update_data === false )
		{
			$ret['status'] = 'timeout';
			return $ret;
		}
	
		if ( isset($update_data->key_status) )
			$ret['status'] = $update_data->key_status;
	
		return $ret;
	}
	
	function deregister_license($product, $options) {
	
		$ret = array(
				"status" => "empty"
		);
	
		if ( !isset($options) || empty($options['wonderplugin-key']) )
			return $ret;
	
		$key = sanitize_text_field( $options['wonderplugin-key'] );
		if ( empty($key) )
			return $ret;
	
		$info = $this->get_plugin_info( $product );
		
		if ( !empty($info) )
		{
			$info->key = '';
			$info->key_status = 'empty';
			$info->key_expire = 0;
			$this->save_plugin_info( $product, $info );
		}
		
		$this->clear_plugin_key();
	
		$update_data = $this->get_update_data( $product, 'deregister', $key );
		if ($update_data === false)
		{
			$ret['status'] = 'timeout';
			return $ret;
		}
	
		$ret['status'] = 'success';
	
		return $ret;
	}

	function show_register() {
		?>
		<div class="wrap">
		
		<h2><?php _e( 'Register', 'wonderplugin' ); ?> </h2>

		<div class="wonderplugin-panel-section">
		<?php		
		if (isset($_POST['save-license']) && check_admin_referer('wonderplugin-woocommerce', 'wonderplugin-woocommerce-register') )
		{		
			unset($_POST['save-license']);

			$this->productlist = apply_filters( 'wonderplugin_woocommerce_update_productlist', array() );

			foreach ( $this->productlist as $product )
			{
				$ret = $this->check_license( $product, $_POST );
						
				if ($ret['status'] == 'valid')
					echo '<div class="updated"><p><b>' . $product->title . '</b>: The key has been saved. WordPress caches the update information. If you still see the message "Automatic update is unavailable for this plugin", please wait for several hours, then goto WordPress left menu Dashboard -> Updates, click the button "Check Again".</p></div>';
				else if ($ret['status'] == 'expired')
					echo '<div class="error"><p><b>' . $product->title . '</b>: Your free upgrade period has expired, please renew your license.</p></div>';
				else if ($ret['status'] == 'invalid')
					echo '<div class="error"><p><b>' . $product->title . '</b>: The key is invalid.</p></div>';
				else if ($ret['status'] == 'abnormal')
					echo '<div class="error"><p><b>' . $product->title . '</b>: You have reached the maximum website limit of your license key. Please log into the membership area and upgrade to a higher license.</p></div>';
				else if ($ret['status'] == 'misuse')
					echo '<div class="error"><p><b>' . $product->title . '</b>: There is a possible misuse of your license key, please contact support@wonderplugin.com for more information.</p></div>';
				else if ($ret['status'] == 'timeout')
					echo '<div class="error"><p><b>' . $product->title . '</b>: The license server can not be reached, please try again later.</p></div>';
				else if ($ret['status'] == 'empty')
					echo '<div class="error"><p><b>' . $product->title . '</b>: Please enter your license key.</p></div>';
				else if (isset($ret['message']))
					echo '<div class="error"><p><b>' . $product->title . '</b>: ' . $ret['message'] . '</p></div>';
			}
			
		}
		else if (isset($_POST['deregister-license']) && check_admin_referer('wonderplugin-woocommerce', 'wonderplugin-woocommerce-register') )
		{			
			$this->productlist = apply_filters( 'wonderplugin_woocommerce_update_productlist', array() );
			
			foreach ( $this->productlist as $product )
			{
				$ret = $this->deregister_license( $product, $_POST );
				
				if ($ret['status'] == 'success')
					echo '<div class="updated"><p><b>' . $product->title . '</b>: The key has been deregistered.</p></div>';
				else if ($ret['status'] == 'timeout')
					echo '<div class="error"><p><b>' . $product->title . '</b>: The license server can not be reached, please try again later.</p></div>';
				else if ($ret['status'] == 'empty')
					echo '<div class="error"><p><b>' . $product->title . '</b>: The license key is empty.</p></div>';
			}
		}
				
		$key = $this->get_plugin_key();
		?>

		<?php 
		$settings = $this->common->get_settings();
		$disableupdate = $settings['disableupdate'];
		if ( $disableupdate )
		{
			echo "<h3 style='padding-left:10px;'>The plugin version check and update is currently disabled. You can enable it in the Settings tab.</h3>";
		}
		else
		{
		?> <div> <?php
			if ( empty($key) ) { ?>

				<form method="post" onsubmit="return $.wonderpluginValidateLicenseForm()">
				<?php wp_nonce_field('wonderplugin-woocommerce', 'wonderplugin-woocommerce-register'); ?>

				<div class="error" style="display:none;" id="license-form-message"></div>
				<table class="form-table">
				<tr>
					<th>Enter Your License Key:</th>
					<td>
					<input name="wonderplugin-key" type="text" id="wonderplugin-key" value="" class="regular-text" />
					<input type="submit" name="save-license" class="button button-primary" value="Register"  />
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
					<p><strong><label><input name="accept-terms" type="checkbox" id="accept-terms"> By entering your license key and registering your website, you agree to the following terms:</label></strong></p>
					<ul style="list-style-type:square;margin-left:20px;">
						<li>The key is unique to your account. You may not distribute, give away, lend or re-sell it. We reserve the right to monitor levels of your key usage activity and take any necessary action in the event of abnormal usage being detected.</li>
						<li>By entering your license key and clicking the button "Register", your domain name, the plugin name and the key will be sent to the plugin website <a href="https://www.wonderplugin.com" target="_blank">https://www.wonderplugin.com</a> for verification and registration.</li>
						<li>You can view all your registered domain name(s) and plugin(s) in <a href="https://www.wonderplugin.com/members/" target="_blank">WonderPlugin Members Area</a>, left menu "License Key and Register".</li>
						<li>For more information, please view <a href="https://www.wonderplugin.com/terms-of-use/" target="_blank">Terms of Use</a>.</li>
					</ul>
					</td>
				</tr>
				</table>
				</form>

			<?php } else { ?>

				<form method="post">
				<?php wp_nonce_field('wonderplugin-woocommerce', 'wonderplugin-woocommerce-register'); ?>
				<p>You have entered your license key and your website has been successfully registered. &nbsp;&nbsp;<input name="wonderplugin-key" type="hidden" id="wonderplugin-key" value="<?php echo esc_html($key); ?>" class="regular-text" /><input type="submit" name="deregister-license" class="button button-primary" value="Deregister"  /></p>
				</form>

				<?php
				$this->productlist = apply_filters( 'wonderplugin_woocommerce_update_productlist', array() );

				foreach ( $this->productlist as $product )
				{
					$info = $this->get_plugin_info( $product );
					if (!empty($info->key_status) && $info->key_status == 'expired') { ?>
						<div class="wonderplugin-error"><p><b><?php echo $product->title; ?></b>: Your free upgrade period has expired.</strong> To get upgrades, please <a href="https://www.wonderplugin.com/renew/" target="_blank">renew your license</a>.</p></div>	
					<?php }
				} ?>

			<?php } ?>
			</div>
		<?php } ?>
		</div>

		<p><a href="<?php echo admin_url('update-core.php?force-check=1'); ?>"><button class="button-primary">Check For WordPress Plugin Updates</button></a></p>
		
		<div class="wonderplugin-panel-section">
		<ul style="list-style-type:square;font-size:16px;line-height:28px;margin-left:24px;">
		<li>To find your license key, please log into <a href="https://www.wonderplugin.com/members/" target="_blank">WonderPlugin Members Area</a>, then click "License Key and Register" on the left menu.</li>
		<li>After registration, when there is a new version available and you are in the free upgrade period, you can directly upgrade the plugin in your WordPress dashboard. If you do not register, you can still upgrade the plugin manually: <a href="https://www.wonderplugin.com/wordpress-carousel-plugin/how-to-upgrade-to-a-new-version-without-losing-existing-work/" target="_blank">How to upgrade to a new version without losing existing work</a>.</li>
		</ul>
		<h3>Tutorial and FAQ</h3>
		<ul style="list-style-type:square;font-size:16px;line-height:28px;margin-left:24px;">
		<li><a href="https://www.wonderplugin.com/how-to-upgrade-a-commercial-version-plugin-to-the-latest-version/" target="_blank">How to register your website and upgrade the commercial version plugin</a></li>
		<li><a href="https://www.wonderplugin.com/register-faq/" target="_blank">Where can I find my license key and other frequently asked questions</a></li>
		</ul>
		</div>
			
		<?php
	}
}