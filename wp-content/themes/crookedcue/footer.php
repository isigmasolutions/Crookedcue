<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div>
         <?php if(is_page('5')) { } else { ?>
        <section class="partiesEvents" style="background-image:url(<?php the_field('corporate_functions_featured_image','options');?>)">
        
        
	<div class="container">

		<h2><?php the_field('corporate_functions_title','options');?></h2>
		<a href="<?php the_field('corporate_functions_button_url','options');?>">Find A  Table</a>

	</div>
</section>
   <?php } ?>
        <!-- #content -->

		<!-- ------------------------------------------- -->
        <?php

$testimoniallist = new WP_Query('posts_per_page=-1&post_type=global&orderby=menu_order&order=ASC');
if($testimoniallist->have_posts()) : while($testimoniallist->have_posts()): $testimoniallist->the_post();

?>
<footer class="footer">
	<div class="container">
		<div class="row">
					<div class="col-md-4 col-sm-6">
						<h3><a href="<?php the_field('etobicoke_location_link');?>"><?php the_field('etobicoke_location_title');?></a></h3>
						<ul>
							<li><span><i class="fas fa-map-marker-alt"></i></span> <span> <?php the_field('etobicoke_address');?></span></li>
							<li><span><img src="/wp-content/themes/crookedcue/assets/img/Group842@2x1.png"></span><span><a href="tel:<?php the_field('etobicoke_phone');?>"><?php the_field('etobicoke_phone');?></a></span></li>
							<li><span><i class="far fa-envelope"></i></span><span><a href="mailto:<?php the_field('etobicoke_email');?>"><?php the_field('etobicoke_email');?></a></span></li>
							<li><a href="<?php the_field('etobicoke_location_get_a_table');?>" class="TableBtn">Get a Table</a></li>
							
						</ul>
					</div>
					
					<div class="col-md-4 col-sm-6">
						<div class="Middle">
						<h3><a href="<?php the_field('mississauga_location_link');?>"><?php the_field('mississauga_location_title');?></a></h3>
						<ul>
							<li><span><i class="fas fa-map-marker-alt"></i></span> <span> <?php the_field('mississauga_address');?></span></li>
							<li><span><img src="/wp-content/themes/crookedcue/assets/img/Group842@2x1.png"></span><span><a href="tel:<?php the_field('mississauga_phone');?>"><?php the_field('mississauga_phone');?></a></span></li>
							<li><span><i class="far fa-envelope"></i></span><span><a href="mailto:<?php the_field('mississauga_email');?>"><?php the_field('mississauga_email');?></a></span></li>
							<li><a href="<?php the_field('mississauga_location_get_a_table');?>" class="TableBtn">Get a Table</a></li>
							
						</ul>
					</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="social">
							<ul>
						<li>Follow Us</li>
						<li>
						<ul class=" socialinner">
							<li><a href="<?php the_field('facebook');?>"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/facebook.png"></a></li>
							<li><a href="<?php the_field('instagram');?>"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/instagram.png"></a></li>
							<li><a href="<?php the_field('yelp');?>"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/yelp.png"></a></li>
							<li><a href="<?php the_field('tripadvisor');?>"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/tripadvisor.png"></a></li>
							<li><a href="<?php the_field('group');?>"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/Group.png"></a></li>
						</ul>
					</li>
						<li><?php the_field('reservations_are_recommended_title');?></li>
						<li><a href="<?php the_field('booking_button_url');?>"><?php the_field('booking_button_title');?></a></li>
						<li><a href="<?php the_field('privacy');?>">Privacy</a>  |  <a href="<?php the_field('terms');?>">Terms</a></li>
                        </ul>

					</div>
				</div>
				</div>
	</div>
</footer>


<!-- Button to Open the Modal -->
<button style="display: none;" id="onloadopen" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalpopuplocation" data-backdrop="static" data-keyboard="false">
  Open modal
</button>
<?php //$bgimage =   get_field( "corporate_functions_featured_image" , 'option' ); ?>
<!-- The Modal -->
<!-- <div class="modal modalpopuplocation" id="modalpopuplocation">
  <div class="modal-dialog">
    <div class="modal-content">

     
      <div class="modal-header">
        <h4 class="modal-title">WELCOME!</h4>
        <p>Please select the location</p>
        <button type="button" class="close" data-dismiss="modal">
          <img src="<?php //bloginfo( 'template_directory' ); ?>/assets/img/close-btn.svg">
        </button>
      </div>

      
      <div class="modal-body container selectBox">
      	<div class="row">
        <div class="col-md-12 top">  
        <div class="bg">      	
        		<h3><?php //echo  get_field( "location_title" , 'option' );?></h3>
        		<p><?php //echo get_field( "location_address" , 'option');?></p>
        		<p><strong><?php //echo get_field( "phone_number" , 'option');?></strong></p>        
        	</div>
        </div>
         </div>
        <div class="row bottom">
        	<div class="col-md-4">
        		<select name="numberofguest" id="numberofguest">
        			<option>Number of guests</option>
        			<?php  for($i =0 ; $i<=100; $i++) : ?>
        				<option <?php // echo $i;?>><?php echo $i;?></option>
        			<?php  endfor;?>	
        		</select>
        	</div>
        	<div class="col-md-4">
        		 <input type="date" name="popupdatepick" id="popupdatepick">
        	</div>
        	<div class="col-md-4">
        		<input type="time" id="appt" name="appt">

        	</div>
        </div>

        <input type="button" name="reservetable" id="reservetable" class="reservetable-btn" value="Reserve your table">
        </div>
      </div>

    </div>
  </div> -->
</div>
<?php if(is_page(2)){

}
else{
  echo '<style>.xoo-wsc-basket {
  display: none;
}</style>';
}

?>

<div class="copyRight"><p><?php the_field('copyright');?></p></div>
<?php endwhile; endif; wp_reset_query(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<!-- <script src="<?php //bloginfo( 'template_directory' ); ?>/assets/js/jquery.hashchange.min.js"></script>
<script src="<?php //bloginfo( 'template_directory' ); ?>/assets/js/PageScroll2id.js" ></script> -->
<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/jquery.mobile-menu.min.js" ></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/custom.js" ></script>
	<script>
jQuery(document).ready(function($){

  jQuery(".location").click(function(){
    jQuery(".megamenu").toggle();
	
  });

	
	<script>
	jQuery(".location").click(function(){
  jQuery(".header").toggleClass("white-bg");
		jQuery(".header").addClass("white");
});
	
            jQuery("#mobile-menu").mobileMenu({
                MenuWidth: 250,
                SlideSpeed : 300,
                WindowsMaxWidth : 767,
                PagePush : true,
                FromLeft : true,
                Overlay : true,
                CollapseMenu : true,
                ClassName : "mobile-menu"
            });

             jQuery(window).on('load',function(){
			        jQuery('#onloadopen').trigger('click');

			        //localStorage.setItem('popState','shown');
			    });

             jQuery('#reservetable').on('click' , function(){

             	//alert('asasa');
             	var numberofguest = jQuery('#numberofguest').val();
             	var popupdatepick = jQuery('#popupdatepick').val();
             	var time = jQuery('#appt').val();

             	localStorage.setItem('numberofguestpopup',numberofguest);
             	localStorage.setItem('popupdatepickpopup',popupdatepick);
             	localStorage.setItem('timepopup',time);
             	window.location.href = "/party-planner";
             	//alert(numberofguest + popupdatepick + appt);
             })

             
        });
	</script>	

    
<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/jquery.sticky.js" ></script>
<script>
jQuery(document).ready(function() {jQuery(".header-inner").sticky({topSpacing:0}); });
jQuery(document).ready(function() {jQuery(".our-menu").sticky({topSpacing:111}); });
</script>


    <script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/stickySidebar.js"></script>
		
		<script>
		var a = new StickySidebar('#sidebar', {
			topSpacing: 120,
			containerSelector: '.shiftrowonscroll',
			innerWrapperSelector: '.sidebar-inner'
		});
		</script>
	</div><!-- .site-content-contain -->
</div><!-- #page -->  

<?php wp_footer(); ?>

</body>
</html>