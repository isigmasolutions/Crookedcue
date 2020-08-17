<?php
/**
Template Name: view_order
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
error_reporting(0);
get_header('inner'); ?> 

	<?php 
		if ( is_checkout() && !empty( @is_wc_endpoint_url('order-received') ) ) {
	include 'thanku-page.php';
}

else{

	include 'checkout-page.php';

}

	?>

<?php
get_footer();