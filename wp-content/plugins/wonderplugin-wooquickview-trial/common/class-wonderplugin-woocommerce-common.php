<?php 

if ( ! defined( 'ABSPATH' ) )
	exit;

require_once 'class-wonderplugin-woocommerce-update.php';

class WonderPlugin_WooCommerce_Common {

	public $plugin, $version, $update;

	function __construct( $plugin ) {

		$this->plugin = $plugin;
		$this->update = new WonderPlugin_WooCommerce_Update( $this );
	}

	function show_register() {

		if ( isset( $this->update ) )
			$this->update->show_register();
	}

	function show_overview() {
	?>	
		<div class='wrap'>			
	
		<h2><?php _e( 'WooCommerce Plugin', 'wonderplugin' ); ?> </h2>
		
		<div class="wonderplugin-panel-section">
		<h2><?php _e( 'Wonder WooCommerce Quick View', 'wonderplugin' ); ?></h2>
		<p>Wonder WooCommerce Quick View adds a quick view button to products in the WooCommerce shop page. The button opens the product details in a lightbox popup when clicked, customers can quickly view the product details, add the product to shopping cart, continue shopping and browsing other products without leaving the shop page.</p>
		<p>
		<?php
		if ( class_exists( 'WonderPlugin_WooQuickView_Plugin' ) ) 
		{ 
			?>
			<a href="<?php echo admin_url('admin.php?page=wonderplugin_wooquickview'); ?>" ><button type="button" class="button button-primary button-hero">Quick View Settings</button></a>
			<?php
			if ( class_exists( 'WonderPlugin_WooQuickView_Plugin' ) )
			{
				global $wonderplugin_wooquickview;
				if ( isset( $wonderplugin_wooquickview ) && ( $wonderplugin_wooquickview->plugin_license_type == 'T' ) ) { ?>
				<a href="https://www.wonderplugin.com/woocommerce-quick-view/order/" target="_blank"><button type="button" class="button button-primary button-hero">Upgrade to Pro Version</button></a>
				<?php }
			}
		}
		?>
		<a href="https://www.wonderplugin.com/woocommerce-quick-view/" target="_blank"><button type="button" class="button button-secondary button-hero">Homepage</button></a>
		<a href="https://www.wonderplugin.com/demo/" target="_blank"><button type="button" class="button button-secondary button-hero">View Demo</button></a>
		</p>
		</div>

		<div class="wonderplugin-panel-section">
		<?php $this->show_news(); ?>
		</div>

		</div>
	<?php
	}

	function show_news() {
		
		include_once( ABSPATH . WPINC . '/feed.php' );
		
		$rss = fetch_feed( 'https://www.wonderplugin.com/feed/' );
		
		$maxitems = 0;
		if ( ! is_wp_error( $rss ) )
		{
			$maxitems = $rss->get_item_quantity( 5 );
			$rss_items = $rss->get_items( 0, $maxitems );
		}
		?>
		
		<h2><?php _e( 'Wonder Plugin News and Tutorials', 'wonderplugin' ); ?> </h2>
		
		<ul class="wonderplugin-feature-list">
		    <?php if ( $maxitems > 0 ) {
		        foreach ( $rss_items as $item )
		        {
		        	?>
		        	<li>
		                <a href="<?php echo esc_url( $item->get_permalink() ); ?>" target="_blank" 
		                    title="<?php printf( __( 'Posted %s', 'wonderplugin_carousel' ), $item->get_date('j F Y | g:i a') ); ?>">
		                    <?php echo esc_html( $item->get_title() ); ?>
		                </a>
		                <p><?php echo esc_html( $item->get_description() ); ?></p>
		            </li>
		        	<?php 
		        }
		    } ?>
		</ul>
		<?php
	}

	/**
	 * Show tootls 
	 */
	function show_tools() {
	?>
		<div class='wrap'>			
	
		<h2><?php _e( 'Tools', 'wonderplugin' ); ?> </h2>

		<ul class="wonderplugin-tab-buttons-horizontal" data-panelsid="wonderplugin-wooquickview-tools-panels">
			<li class="wonderplugin-tab-button-horizontal wonderplugin-tab-button-horizontal-selected"></span><?php _e( 'Plugin Settings', 'wonderplugin' ); ?></li>
			<li class="wonderplugin-tab-button-horizontal"></span><?php _e( 'Server Info', 'wonderplugin' ); ?></li>
			<?php do_action( 'wonderplugin_woocommerce_addtools_tab' ); ?>
		</ul>

		<ul class="wonderplugin-tabs-horizontal" id="wonderplugin-wooquickview-tools-panels">
			
			<li class="wonderplugin-tab-horizontal wonderplugin-tab-horizontal-selected">

				<?php 
				if ( isset($_POST['save-settings']) && check_admin_referer('wonderplugin-woocommerce', 'wonderplugin-woocommerce-settings') )
				{
					$this->save_settings( $_POST );
					echo '<div class="wonderplugin-saved updated"><p>Settings saved</p></div>';
				}
				$settings = $this->get_settings();
				?>
				<form method="post">
				<?php wp_nonce_field( 'wonderplugin-woocommerce', 'wonderplugin-woocommerce-settings' ); ?>

				<table class="form-table">
					<tr>
					<th><?php _e( 'Data Option', 'wonderplugin' ); ?></th>
					<td>						
					<label><input type="hidden" value="0" name="keepdata"><input name="keepdata" type="checkbox" value="1" <?php echo $settings['keepdata'] ? 'checked' : ''; ?> /><?php _e( 'Keep data when deleting the plugin', 'wonderplugin' ); ?></label>	
					</td>
					</tr>

					<tr>
					<th><?php _e( 'Script Option', 'wonderplugin' ); ?></th>
					<td>						
					<label><input type="hidden" value="0" name="addjstofooter"><input name="addjstofooter" type="checkbox" value="1" <?php echo $settings['addjstofooter'] ? 'checked' : ''; ?> /><?php _e( 'Add plugin JS script file to the footer (wp_footer hook must be implemented by the WordPress theme)', 'wonderplugin' ); ?></label>
					</td>
					</tr>

					<tr>
					<th><?php _e( 'Update Option', 'wonderplugin' ); ?></th>
					<td>						
					<label><input type="hidden" value="0" name="disableupdate"><input name="disableupdate" type="checkbox" value="1" <?php echo $settings['disableupdate'] ? 'checked' : ''; ?> /><?php _e( 'Disable plugin version check and update', 'wonderplugin' ); ?></label>
					</td>
					</tr>
				</table>

				<?php do_action( 'wonderplugin_woocommerce_settings_options' ); ?>

				<p><input type="submit" name="save-settings" class="button button-primary button-hero" value="Save Changes"  /></p>
				</form>
			</li>

			<li class="wonderplugin-tab-horizontal">
				<div id="phpinfo">
				<?php $this->export_phpinfo(); ?>
				</div>
			</li>
			<?php do_action( 'wonderplugin_woocommerce_addtools_panel' ); ?>
		</ul>
	<?php
	}
	
	function get_settings() {

		$defaults = apply_filters( 'wonderplugin_woocommerce_settings_defaults', array(
			'keepdata'			=> 1,
			'addjstofooter'		=> 0,
			'disableupdate'		=> 0
		) );

		$settings = get_option( 'wonderplugin_woocommerce_settings', array() );
				
		return array_merge( $defaults, $settings );
	}

	function save_settings( $settings ) {

		update_option( 'wonderplugin_woocommerce_settings', $settings );
	}

	function export_phpinfo() {
		ob_start();
		phpinfo();
		$phpinfo = ob_get_contents();
		ob_end_clean();
		$phpinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $phpinfo);
		echo "
			<style type='text/css'>
				#phpinfo {}
				#phpinfo pre {margin: 0; font-family: monospace;}
				#phpinfo a:link {color: #009; text-decoration: none; background-color: #fff;}
				#phpinfo a:hover {text-decoration: underline;}
				#phpinfo table {border-collapse: collapse; border: 0; width: 934px; box-shadow: 1px 2px 3px #ccc;}
				#phpinfo .center {text-align: center;}
				#phpinfo .center table {margin: 1em auto; text-align: left;}
				#phpinfo .center th {text-align: center !important;}
				#phpinfo td, #phpinfo th {border: 1px solid #666; font-size: 75%; vertical-align: baseline; padding: 4px 5px;}
				#phpinfo h1 {font-size: 150%;}
				#phpinfo h2 {font-size: 125%;}
				#phpinfo .p {text-align: left;}
				#phpinfo .e {background-color: #ccf; width: 300px; font-weight: bold;}
				#phpinfo .h {background-color: #99c; font-weight: bold;}
				#phpinfo .v {background-color: #ddd; max-width: 300px; overflow-x: auto; word-wrap: break-word;}
				#phpinfo .v i {color: #999;}
				#phpinfo img {float: right; border: 0;}
				#phpinfo hr {width: 934px; background-color: #ccc; border: 0; height: 1px;}
			</style>
			<div id='phpinfo'>
				$phpinfo
			</div>
			";
	}
}
