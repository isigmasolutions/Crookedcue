<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>

<section class="innerbanner">
    <div class="mainHeading">
      <h1><?php the_title('');?></h1>
    
    </div>
  </section>
    
<div class="wrap">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
<div class="container">

		<?php
// $user = get_user_by( 'ID', 1 );
// echo $user_id = $user->user_nicename;
		while ( have_posts() ) :
			the_post();
    global $wpdb;
/*$result = $wpdb->get_results("SELECT count(*)  as count FROM `0nt_rsvp_attendee` where `attendee_status` = 'yes' and post_id =" .$post->ID);

$result2 = $wpdb->get_results("SELECT count(*)  as count2 FROM `0nt_rsvp_attendee` where post_id =". $post->ID);*/

//echo "<b>Confirmed Number Of Invites : </b>" .$result['0']->count;
//;
//echo "<br>";
//echo "<b>Total Invites Send : </b>". $result2['0']->count2;
echo "<br>";
echo "<h3>".the_title()."</h3>";
echo '<label>Start Date : </label>'.get_post_meta($post->ID, 'start_rsvp_date',true);
echo '<label>End Date : </label>'.get_post_meta($post->ID, 'end_rsvp_date',true);
echo '<label>Event Location : </label>'.get_post_meta($post->ID, 'event_location',true);
$numberofguest = get_post_meta($post->ID, 'event_additional_guest',true);
the_content();
the_post_thumbnail('medium');
$q = wp_get_post_revisions( get_the_id() );
        echo 'version : '.count( $q );

 
		endwhile; // End of the loop.
		?>
<form id="rsvpform">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input value="<?php echo @$_REQUEST['sendtoemail']?>" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Name" name="name">
  </div>
  <div class="form-group form-check">    
    <label class="form-check-label" for="exampleCheck1">Are you attending the event?</label>
    Yes : <input type="radio" name="rsvptruefalse" value="yes" checked="checked">
    NO  : <input type="radio" name="rsvptruefalse" value="no">
  </div>
    <div class="form-group">
    <!-- <label for="exampleInputPassword1">Additional Guest</label> -->
    <!-- <input id="AdditionalGuest" type="button" class="buttonclass tribe-button tribe-button--rsvp" value="Add Additional Guest"> -->
    <span>Dite Comment : </span>

  <?php echo get_post_meta($post->ID, 'dite_comment',true); ?>
  </div>
  <input type="hidden" name="postid" value="<?php the_id();?>">
  <input type="hidden" name="fromid" value="<?php echo @$_REQUEST['fromid']?>">
  <input type="hidden" name="fromemail" value="<?php echo @$_REQUEST['fromemail']?>">
      
  <div class="form-group">
    <label for="quantity">Additional Guest:</label>
    <medium>Please Add if you have any additional Guest. Minimum: 1 Maximum: <?php echo $numberofguest;?></medium>
     <input type="number" id="quantity" name="guestquantity" min="1" max="<?php echo $numberofguest;?>">
  </div>

  <button id="rsvp_process" type="button" name="tickets_process" value="1" class="buttonclass tribe-button tribe-button--rsvp">
							Confirm RSVP						</button>
</form>
     <!--  <form id="AdditionalGuesthtml">
        
      </form> -->
<div class="errormessage"></div>
</div>
    </main><!-- #main -->
  </div><!-- #primary -->
</div><!-- .wrap -->
<script type="text/javascript">
  
 jQuery(document).ready(function(){ 
var count = 0 ;
jQuery('#AdditionalGuest').on('click' , function(){
count++;
    var appendhtmlofguest = 'Guest '+count+'<div class="form-group"><label for="exampleInputEmail1">Email address</label><input name="guest[guestemail][]" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Guet email"></div><div class="form-group"><label for="exampleInputPassword1">Guest Name</label><input type="text" class="form-control" id="name" placeholder="Name" name="guest[guestname][]"></div>';

      //jQuery('#AdditionalGuesthtml').append(appendhtmlofguest);

  });

 });

</script>
<?php
get_footer();
