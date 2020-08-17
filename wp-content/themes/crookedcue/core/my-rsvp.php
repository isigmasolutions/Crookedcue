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
// $args = array(
//     'author' => $current_user->ID,
//     'post_type' => 'rsvp_event',
//     'post_status' => 'publish'
//     //'posts_per_page' => -1
// );
$args = array( 'post_type' => 'rsvp_event', 'posts_per_page' => 10,'author' => $current_user->ID );
$the_query = new WP_Query( $args ); 
$order_party_type =  get_post_meta(get_the_id(), 'order_party_type',true);
?>




<button onclick="history.go(-1);">Back </button>





<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
		<thead>

			<tr>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span class="nobr">Event Name</span></th>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span class="nobr">Event Date</span></th>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span class="nobr">Party Type</span></th>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">Event Location </span></th>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">Actions</span></th>
									
							</tr>
		</thead>

		<tbody>
				 <?php if ( $the_query->have_posts() ) :
while ( $the_query->have_posts() ) : $the_query->the_post(); ?>		
			<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-cancelled order">
											<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
												<?php the_title()?>

													</td>
													
											<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
												<?php echo get_post_meta(get_the_id(), 'start_rsvp_date',true);?>

													</td>

											<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
												<?php echo get_post_meta(get_the_id(), 'order_party_type',true);?>

													</td>		

					
											<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
												<?php echo get_post_meta(get_the_id(), 'event_location',true);?>

													</td>	

													<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
												<span class="buttons">

	<?php 
        $getpostmeta = get_post_meta(get_the_id(), 'number_of_guests',true);
        $start_rsvp_date = get_post_meta(get_the_id(), 'start_rsvp_date',true);
        $event_location = get_post_meta(get_the_id(), 'event_location',true);

	$getpostlink =  get_permalink()."&postid=".get_the_id()."&partydate=".$start_rsvp_date."&eventlocation=".$event_location; ?>
	<a class="managersvpbutton" href="/my-account/sendrsvp?link=<?php echo $getpostlink; ?>">Send Invites</a>
	<a class="managersvpbutton" href="/my-account/managersvp?postid=<?php echo base64_encode(get_the_id());?>">Manage Rsvp</a>

<a target="_blank" class="managersvpbutton" href="<?php echo get_post_meta(get_the_id(), 'contact_consaltent',true);?>">Contact Consaltent</a>
</span>

													</td>	
						</tr>														
<?php wp_reset_postdata(); ?>
<?php endwhile;endif; ?>

<?php //print_r($the_query);?>
		</tbody>
	</table>
</div>
</div>
</div>
	</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();?>