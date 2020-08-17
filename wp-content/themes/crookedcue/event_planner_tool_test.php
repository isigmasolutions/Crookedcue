<?php
/**
 * Template Name:test
 */

get_header('inner'); ?>


<section class="innerbanner">
		<div class="mainHeading">
			<h1><?php the_title('');?></h1>
		</div>
	</section>
    <div class="party-planner">
<!-- ------------------------how to order--------------------------------------- -->
	<section class="HowOrder">
		<div class="container">
			<h2>3 EASY STEPS</h2>
			<h3>TO PLANNING YOUR NEXT EVENT</h3>
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<a href="#"  class="steps"><ul>
							<li>1. Select A Location</li>
							<li><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/partdata.png" alt=""></li>
							<li>Please select party Venue</li>
							
						</ul></a>
					</div>
					
					<div class="col-md-4 col-sm-12">
						<a href="#"  class="steps"><ul class="activeStep">
							<li>2. Plan your party</li>
							<li><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/confirmorder.png" alt=""></li>
							<li>Input all the data for your party</li>

						</ul></a>
					</div>
					<div class="col-md-4 col-sm-12">
						<a href="#" class="steps"><ul>
							<li>3. Book</li>
							<li><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/coordeinatePayment.png" alt=""></li>
							<li>Book Your Party and our event planner specialist will call you.</li>
						</ul></a>
					</div>
				</div>
		</div>
	</section>
<!-- -------------------------------------------how to order ends------------------------------------------------------------------ -->

<!-- ---------------------------------------------------Location---------------------------------------------- -->
<section class="location_sideBAr">
	<div class="container">
		<div class="row shiftrowonscroll">
			<div class="col-md-3">
			<div id="sidebar">
				<div class="sidebar-inner noneorhide">
                <div class="SideBar">
					<ul id="appendsidebarlocations">
						
						
					</ul>
					
				</div>
				<div class="partyCost">
					<h3>Party Cost</h3>
					<ul>
						<li><span>Total Cost:</span> <strong><?php global $woocommerce; ?><div class="header-cart-total"><?php echo $woocommerce->cart->get_cart_total(); ?></div>CAD</strong></li>
						<li><span>Cost Per Person:</span> <strong><dd id="personcost">$0</dd>CAD</strong></li>
						<?php /*?><li><a  onclick="updatecost()">Update Total</a></li><?php */?>
<?php //echo $amount = preg_replace( '#[^\d.]#', '', $woocommerce->cart->get_cart_total());?>
					</ul>
				</div>

		<div class="loginsidebar">
					<?php 
					global $current_user; get_currentuserinfo();
	if ( is_user_logged_in() ) {

		echo '<h3 class = "welcome-text">Welcome <h3>' . $current_user->user_login."\n"; echo ' | </br>' ; wp_loginout();} else {
		echo '<h3 class = "welcome-text">Welcome, visitor!</h3>' ; wp_loginout();

	}
?>
					
				</div>		
			</div></div></div>
			<div class="col-md-9">
				<!-- ----------------------------location---------------------------------------- -->
				<div class="locationpart" id="Location">
					<div class="selectBox"> 
						<h3>Location</h3>
						<label>Location Selected: </label>
					<select id="locationonchange">
	                <option value="0">Select a location </option>	
                <option value="Mississauga">Mississauga</option>	
				<option value="Etobicoke">Etobicoke</option>				
													
					</select>
				</div>
<div class="noneorhide">
				<div class="white-bg onchangelocation" style="display: none;"><div class="row">
					<div class="col-sm-5">
						<img id="locationimage" src="" alt="">
					</div>
					<div class="col-sm-7">

						<ul>
						<li><strong>Adress:</strong> <span id="locationaddress"> </span></li>
						<li><strong>Phone:</strong> <a id="locationphone" href="(905) 271-7665"></a></li>
					   </ul>
					</div>

				</div>
			</div>
				<!-- -------------------------------location ends------------------------------ -->
				<!-- -------------------------------party information------------------------------- -->

<?php session_start(); //echo "<pre>"; print_r($_SESSION['[partyinfo]']); 

 $date1 = (@$_SESSION['partyinfo']['0']['value']) ? @$_SESSION['partyinfo']['0']['value'] : '';
 $date2 = (@$_SESSION['partyinfo']['1']['value']) ? @$_SESSION['partyinfo']['1']['value'] : '';
 $date3 = (@$_SESSION['partyinfo']['2']['value']) ? @$_SESSION['partyinfo']['2']['value'] : '';
 $numberofguest = (@$_SESSION['partyinfo']['3']['value']) ? @$_SESSION['partyinfo']['3']['value'] : '10';
 $partypurpose  = (@$_SESSION['partyinfo']['4']['value']) ? @$_SESSION['partyinfo']['4']['value'] : '';
 $dietarycomments = (@$_SESSION['partyinfo']['5']['value']) ? @$_SESSION['partyinfo']['5']['value'] : 'Dietary comments' ;
 $eventname =   (@$_SESSION['partyname']) ? @$_SESSION['partyname'] : '';


    $edited = WC()->session->get( 'edit_order' );
    if ( ! empty( $edited ) ) {
    	
$post_id = get_post_meta($edited, 'orderpostid',  true);
$date1 = get_post_meta($post_id, 'start_rsvp_date',  true);
$date2 = get_post_meta($post_id, 'end_rsvp_date',  true);
$partypurpose  =  get_post_meta($post_id, 'order_party_type', true);
$guest =          get_post_meta($post_id, 'event_additional_guest',  true);
$eventname =          get_post_meta($post_id, 'eventname',  true);

}


?>
				<div class="PartyInfo" id="PartyInformation">
					<h3>Party Information</h3>
					<div class="white-bg">
						<form id="PartyInformationform">
						<ul>
						<li class="one col-12"><label>Name of  the Party</label> <input id="nameofparty" class="inputstyle required" type="text" value="<?php echo @$_SESSION['partyname'];?>"></li>	
						<li class="one col-4"><label>Preferred Date 1 </label> <input class="required" type="date" name="date1" value="<?php echo $date1 ?>"></li>
					    <li class="two col-4"><label>Preferred Date 2 </label> <input class="required" type="date" name="date2" value="<?php echo $date2; ?>"></li>
					    <li class="three col-4"><label>Preferred Date 3 </label> <input class="required" type="date" name="date3" value="<?php echo $date3; ?>"></li>
					    <li class="four col-lg-6"><label>Guest Number</label> <input id="numberofguest" value="<?php echo $numberofguest;?>" class="required" type="number" name="numberofguest" placeholder="10"> 

		<select name="partypurpose" class="required">
				<option <?php ($partypurpose == '') ? '' : 'selected';?> value="">Select Party Type</option>	    		
	 <option <?php echo ($partypurpose == 'Balls') ? 'selected' : '';?> value="Balls">Balls</option>
     <option <?php echo ($partypurpose == 'Banquets') ? 'selected' : '';?> value="Banquets">Banquets</option>
     <option <?php echo ($partypurpose == 'Birthday party') ? 'selected' : '';?> value="Birthday party">Birthday party</option>
     <option <?php echo ($partypurpose == 'Surprise party') ? 'selected' : '';?> value="Surprise party">Surprise party</option>
     <option <?php echo ($partypurpose == 'Dinner party') ? 'selected' : '';?> value="Dinner party">Dinner party</option>
     <option <?php echo ($partypurpose == 'Garden party') ? 'selected' : '';?> value="Garden party">Garden party</option>
     <option <?php echo ($partypurpose == 'Cocktail party') ? 'selected' : '';?> value="Cocktail party">Cocktail party</option>
     <option <?php echo ($partypurpose == 'Tea party') ? 'selected' : '';?> value="Tea party">Tea party</option>
     <option <?php echo ($partypurpose == 'Reception') ? 'selected' : '';?> value="Reception">Reception</option>
     <option <?php echo ($partypurpose == 'Soirées') ? 'selected' : '';?> value="Soirées">Soirées</option>
     <option <?php echo ($partypurpose == 'Dances and balls') ? 'selected' : '';?> value="Dances and balls">Dances and balls</option>
     <option <?php echo ($partypurpose == 'Bock party') ? 'selected' : '';?> value="Bock party">Bock party</option>
     <option <?php echo ($partypurpose == 'Costume or fancy dress party') ? 'selected' : '';?> value="Costume or fancy dress party">Costume or fancy dress party</option>
     <option <?php echo ($partypurpose == 'Christmas caroling party') ? 'selected' : '';?> value="Christmas caroling party">Christmas caroling party</option>
     <option <?php echo ($partypurpose == 'Parties for teenagers and young adults') ? 'selected' : '';?> value="Parties for teenagers and young adults">Parties for teenagers and young adults</option>
     <option <?php echo ($partypurpose == 'Pool party') ? 'selected' : '';?> value="Pool party">Pool party</option>
     <option <?php echo ($partypurpose == 'Singles dance party and mixer') ? 'selected' : '';?> value="Singles dance party and mixer">Singles dance party and mixer</option>
     <option <?php echo ($partypurpose == 'Fundraising party') ? 'selected' : '';?> value="Fundraising party">Fundraising party</option>
     <option <?php echo ($partypurpose == 'Graduation party') ? 'selected' : '';?> value="Graduation party">Graduation party</option>
     <option <?php echo ($partypurpose == 'Marriage-related parties') ? 'selected' : '';?> value="Marriage-related parties">Marriage-related parties</option>
     <option <?php echo ($partypurpose == 'Showers') ? 'selected' : '';?> value="Showers">Showers</option>
     <option <?php echo ($partypurpose == 'Housewarming party') ? 'selected' : '';?> value="Housewarming party">Housewarming party</option>
     <option <?php echo ($partypurpose == 'Welcome party') ? 'selected' : '';?> value="Welcome party">Welcome party</option>
     <option <?php echo ($partypurpose == 'Farewell party') ? 'selected' : '';?> value="Farewell party">Farewell party</option>
     <option <?php echo ($partypurpose == 'Cast party') ? 'selected' : '';?> value="Cast party">Cast party</option>
     <option <?php echo ($partypurpose == 'Pre-party') ? 'selected' : '';?> value="Pre-party">Pre-party</option>
     <option <?php echo ($partypurpose == 'After-party') ? 'selected' : '';?> value="After-party">After-party</option>
					    </select></li>
					    <li class="five col-lg-6"><label>Dietary Comments</label><textarea class="required" name="dietarycomments" placeholder="Dietary Comments"></textarea></li>
					    
				    </ul>
				    </form>
				    <ul>
				    <li class="one col-4"><label>Additional Guest Limit</label><input id="extraguest" type="number" value="2"></li>
					</ul>
				</div>
				</div>
				<!-- -------------------------------party information ends------------------------------- -->
<?php //echo do_shortcode('[product_table post_type="shop_order"]');?>
				<div class="appendpartyhtml">
					<div class="Mississaugadive">
					<?php include get_parent_theme_file_path( '/core/locations/mississauga.php' ); ?>
				</div>
				<div class="Etobicokedive">
					<?php include get_parent_theme_file_path( '/core/locations/etobicoke.php' ); ?>
				</div>
				</div>
<?php global $current_user; wp_get_current_user();
if ( is_user_logged_in() ) { 


 //echo 'Username: ' . $current_user->user_email . "\n"; echo 'User display name: ' . $current_user->display_name . "\n"; 
  $specialrequest = (@$_SESSION['organizerinfo']['0']['value']) ? @$_SESSION['organizerinfo']['0']['value'] : 'Tell Us How we can make your event even better. Do you know any special  requests?';
  $organizername = $current_user->display_name;
  $organizeremail = $current_user->user_email;
  $organizeraddress = (@$_SESSION['organizerinfo']['3']['value']) ? @$_SESSION['organizerinfo']['3']['value'] : '';
  $organizerphone = (@$_SESSION['organizerinfo']['4']['value']) ? @$_SESSION['organizerinfo']['4']['value'] : ''; 
  $organizercompany = (@$_SESSION['organizerinfo']['5']['value']) ? @$_SESSION['[organizerinfo]']['5']['value'] : '';


}

else{

	$specialrequest = (@$_SESSION['organizerinfo']['0']['value']) ? @$_SESSION['organizerinfo']['0']['value'] : 'Tell Us How we can make your event even better. Do you know any special  requests?';
  $organizername = (@$_SESSION['organizerinfo']['1']['value']) ? @$_SESSION['organizerinfo']['1']['value'] : '';
  $organizeremail = (@$_SESSION['organizerinfo']['2']['value']) ? @$_SESSION['organizerinfo']['2']['value'] : '';
  $organizeraddress = (@$_SESSION['organizerinfo']['3']['value']) ? @$_SESSION['organizerinfo']['3']['value'] : '';
  $organizerphone = (@$_SESSION['organizerinfo']['4']['value']) ? @$_SESSION['organizerinfo']['4']['value'] : ''; 
  $organizercompany = (@$_SESSION['organizerinfo']['5']['value']) ? @$_SESSION['[organizerinfo]']['5']['value'] : '';


}

/////
//echo "<pre>"; print_r($_SESSION);

//$organizeraddressdisabel = ($organizeremail) ? 'disabled' : 'aasasas';
$organizeraddressdisabelclass = ($organizeremail) ? 'disabledclass' : 'aasasas';
  


?>
				
    	
    <form id="OrganizerInfoform">
    <section class="specialRequest" id="specialRequest">
	<h3>Special Requests</h3>
     <textarea  class="required" name="specialrequest" placeholder="Tell Us How we can make you event even better. Do you know any special requests?"></textarea> 
<h3>Organizer Info</h3>
	<div class="OrganizerInfo" id="OrganizerInfo">
    <div class="OrganizerFrom">
		


			<ul>
			<li><input value="<?php echo @$organizername;?>" type="text" name="organizername" placeholder="Name" class="required"></li>
			<li><input <?php echo @$organizeraddressdisabel; ?> value="<?php echo @$organizeremail;?>" type="email" name="organizeremail" placeholder="Email" class="required <?php echo $organizeraddressdisabelclass;?>"></li>
			<li><input value="<?php echo @$organizeraddress;?>" type="text" name="organizeraddress" placeholder="Address" class="required"></li>
			<li><input value="<?php echo @$organizerphone;?>" type="tel" name="organizerphone" placeholder="Phone" class="required"></li>
			<li><input value="<?php echo @$organizercompany;?>" type="tel" name="organizercompany" placeholder="Company Name " class="required"></li>

			<li></li>

</ul>

		</form>
	</div>
    <a onclick="checkorvieworder('view-order-summary')"  class="orderBtn_1 checkorvieworder">Next Step: View Order Summary</a>
</div>
</section>
	</div>
    </div></div>
</section>
<!-- -----------------------------------------------menu and Location Ends-------------------------------------------------- -->
</div>
<style>
	
	.contact-info {
	display: none;
}
</style>

<script>
jQuery(document).ready(function(){

function updatecost(){

var getnumberofguest = jQuery('#numberofguest').val();
        var partyCostcarttotal = jQuery('.partyCost .header-cart-total').text();
        //alert(partyCostcarttotal);
        removehtml =  partyCostcarttotal; 
        newString = removehtml.replace('$', ''); 
        //alert(newString);
        var getpersiontotalplate = newString / getnumberofguest;
        jQuery('#personcost').html('$'+getpersiontotalplate);
}

updatecost();

});
</script>

<?php
get_footer();