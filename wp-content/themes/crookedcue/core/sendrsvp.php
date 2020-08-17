
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
$getdata = explode( '&', base64_decode($_REQUEST['link']));
//print_r($getdata);

$link = $_REQUEST['link'];
$postid = $_REQUEST['postid'];
$partydate = $_REQUEST['partydate'];
$eventlocation = $_REQUEST['eventlocation'];

?>

<button onclick="history.go(-1);">Back </button>

<span class="responcemessage"></span>
<form id="rsvpform">
  <div class="form-group">
    <label for="exampleInputEmail1">Send Email to multile users with comma saparated.</label>
    <textarea id="emailaddress" required="required"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Rsvp Link</label>
    <input value="<?php echo $link;?>" required="required" type="text" class="form-control" id="rsvplink" placeholder="Rsvp link" name="name">
  </div>
  <input type="hidden" id="idfrom" value="<?php echo $current_user->ID;?>">
  <input type="hidden" id="emailfrom" value="<?php echo $current_user->user_email;?>">

  <input type="hidden" id="postid" value="<?php echo $postid;?>">
  <input type="hidden" id="partydate" value="<?php echo $partydate;?>">
  <input type="hidden" id="eventlocation" value="<?php echo $eventlocation;?>">
  
  <button id="sendemailtousers" type="button" name="tickets_process" value="1" class="tribe-button tribe-button--rsvp">
							Send Email						</button>
</form>

</div>
</div>
	</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();?>