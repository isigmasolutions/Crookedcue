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


<section class="innerbanner">
		<div class="mainHeading">
			<h1><?php the_title('');?></h1>
		
		</div>
	</section>
    
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<div class="container">
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
	<?php 
session_start();
	 //echo "<pre>";
			//print_r($_SESSION);
  // $user = get_user_by( 'email', 'devdevelopment6@gmail.com' );
    
  //       echo "==>".$user_id = $user->ID;
	?>

<!-- -------------------------------party information------------------------------- -->
<div class="order-suminfo">
				<div class="PartyInfo" id="PartyInformation">
					<h3>Party Information</h3>
					<div class="white-bg">
						<form id="PartyInformationform">
						<ul>
						<li class="one col-4"><label>Preferred Date 1 </label> <span><?php echo @$_SESSION['partyinfo']['0']['value'] ?></span></li>
					    <li class="two col-4"><label>Preferred Date 2 </label> <span> <?php echo @$_SESSION['partyinfo']['1']['value'] ?></span></li>
					    <li class="three col-4"><label>Preferred Date 3 </label> <span><?php echo @$_SESSION['partyinfo']['2']['value'] ?></span></li>
					    <li class="four col-6">
                        <ul>
                        <li><label>Guest Number</label> <span><?php echo @$_SESSION['partyinfo']['3']['value'] ?></span></li>
                         <li><label>Purpose of the Party</label> <span> <?php echo @$_SESSION['partyinfo']['4']['value'] ?></span></li>
                        </ul>
                        </li>  
					   
					    <li class="five col-6"><label>Dietary comments</label> <span> <?php echo @$_SESSION['partyinfo']['5']['value'] ?></span></li>
				    </ul>
				    </form>
				</div>
				</div>
				<!-- -------------------------------party information ends------------------------------- -->

    <div class="specialRequest" id="specialRequest">
	<h3>Special Requests</h3>
	<ul>
		<li><label>Special Requests</label> : <?php echo @$_SESSION['organizerinfo']['0']['value'] ?></li>
	</ul>
    </div>

	<div class="OrganizerInfo" id="OrganizerInfo">
    <h3>Organizer Info</h3>
    <div class="OrganizerFrom">
		

		<form id="OrganizerInfoform">
			<ul>
			<li><label>Name</label> <span><?php echo @$_SESSION['organizerinfo']['1']['value'] ?></span></li>
			<li><label>Email</label> <span><?php echo @$_SESSION['organizerinfo']['2']['value'] ?></span></li>
			<li><label>Address</label> <span><?php echo @$_SESSION['organizerinfo']['3']['value'] ?></span></li>
			<li><label>Phone</label> <span> <?php echo @$_SESSION['organizerinfo']['4']['value'] ?></span></li>
			<li><label>Company Name</label><span> <?php echo @$_SESSION['organizerinfo']['5']['value'] ?></span></li>


</ul>
		</form>
	</div>
</div>



<p class="return-to-shop">
		<a class="button wc-backward" href="/party-planner/?<?php echo $_SESSION['locationname'];?>">
			Return to Party Planner		</a>
	</p> 
	<?php 
		if ( is_checkout() && !empty( @is_wc_endpoint_url('order-received') ) ) {
		echo '<p class="return-to-shop">
		<a class="button wc-backward" href="/my-account/">
			 My Account	</a>
	</p>';
}

	?> 	 
</div>
<!-- -------------------------------------------how to order ends------------------------------------------------------------------ -->
      <?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>    

	<?php the_content(); ?>

	<?php endwhile; ?>

<?php endif; ?>  
	<!-- <div class="OrganizerInfo" id="OrganizerInfo">
    <h3>Cost Per Person : 
<?php //echo " $".$_SESSION['cost_per_person']; ?></h3>
</div>  -->
<p class="return-to-shop">
		<a class="button wc-backward" href="/party-planner/?<?php echo $_SESSION['locationname'];?>">
			Open your Party Planner		</a>
	</p>
	<?php 
		if ( is_checkout() && !empty( @is_wc_endpoint_url('order-received') ) ) {
		echo '<p class="return-to-shop">
		<a class="button wc-backward" href="/my-account/">
			 My Account		</a>
	</p>';
}

	?>   
</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();