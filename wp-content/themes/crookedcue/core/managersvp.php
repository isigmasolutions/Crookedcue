<?php 
get_header();
if ( !is_user_logged_in() ) {
    wp_redirect( site_url().'/my-account');
} 
?>

<section class="innerbanner">
		<div class="mainHeading">
			<h1>My Rsvp</h1>
		
		</div>
	</section>
    
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<div class="container">
<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>
<div class="woocommerce">
<nav class="woocommerce-MyAccount-navigation">
	<ul>
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
<div class="woocommerce-MyAccount-content">
<?php 
global $current_user; 
$current_user = wp_get_current_user();
// echo $current_user->ID;
// echo $current_user->user_email;
$postid = base64_decode($_REQUEST['postid']);
global $wpdb;
$result = $wpdb->get_results("SELECT * FROM `0nt_rsvp_attendee` where `post_id` = $postid");

?>


<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
		<thead>
			<tr>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span class="nobr">Attendee Name</span></th>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span class="nobr">Attendee Email</span></th>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">Status</span></th>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">Additional Guest</span></th>
									
							</tr>
		</thead>

		<tbody>
			<?php
global $wpdb;
			 foreach($result as $wp_formmaker_submits): //echo "<pre>"; print_r($wp_formmaker_submits); ?>
							<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-cancelled order">
											<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
												<?php echo $wp_formmaker_submits->attendee_name;?>

													</td>
											<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
															
													<?php echo $wp_formmaker_submits->attendee_email;?>
													</td>
										<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
															
													<?php echo $wp_formmaker_submits->attendee_status;?>
													</td>
													
										<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
															
													<?php echo $wp_formmaker_submits->additional_guest;?>
													</td>			
											
									</tr>
		<?php endforeach; 

$result = $wpdb->get_results("SELECT count(*)  as count FROM `0nt_rsvp_attendee` where `attendee_status` = 'yes' and post_id =" .$postid);

$result2 = $wpdb->get_results("SELECT count(*)  as count2 FROM `0nt_rsvp_attendee` where post_id =". $postid);

echo "<b>Confirmed Number Of Invites : </b>" .$result['0']->count;
;
echo "<br>";
echo "<b>Total Invites Send : </b>". $result2['0']->count2;

		?>						
						</tbody>
	</table>



</div>
</div>
	</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();?>