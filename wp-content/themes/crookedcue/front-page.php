<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<!-- --------------------------------------------------------------- -->
	<section class="Banner" style="background:url(<?php the_field('banner_image');?>) no-repeat; background-size:cover">
		<div class="mainHeading">
			<?php the_field('banner_content');?>
			<div class="BnrBtn"><a href="<?php the_field('banner_button_url');?>"><?php the_field('banner_button_title');?></a>
				<a href="<?php the_field('banner_button_another _url');?>"><?php the_field('banner_button_another _title');?></a></div>
		</div>
	</section>
<!-- --------------------------------------------------------------- -->
        <?php

$testimoniallist = new WP_Query('posts_per_page=-1&post_type=global&orderby=menu_order&order=ASC');
if($testimoniallist->have_posts()) : while($testimoniallist->have_posts()): $testimoniallist->the_post();

?>
	<section class="optionsLogo">
		<div class="container">
				<div class="row">
					<div class="col-md-6 ">
						<h5><a href="<?php the_field('etobicoke_location_link');?>"><?php the_field('etobicoke_location_title');?></a></h5>
						<div class="row colmBor">
							<!---------------------------------------------------------------------------------->
					<div class="col-md-6 col-sm-12">
                    <div class="option1 ">
						
						<ul>
							<li><span><i class="fas fa-map-marker-alt"></i></span> <span><?php the_field('etobicoke_address');?></span></li>
							<li><span><img src="/wp-content/themes/crookedcue/assets/img/phoneicon.jpg"></span><span><b><a href="tel:<?php the_field('etobicoke_phone');?>"><?php the_field('etobicoke_phone');?></a></b></span></li>
							<li><span><i class="fab fa-instagram"></i></span><span><a href="https://www.instagram.com/<?php the_field('etobicoke_insta_id');?>" target="_blank">@<?php the_field('etobicoke_insta_id');?></a></span></li>
							
						</ul>
                        </div>
					</div>
					
				<div class="col-md-6 col-sm-12">
								<div class="option3">
								<h6><i class="far fa-clock"></i>Hours of Operation:</h6>
                                <?php if( have_rows('etobicoke_hours_of_operation') ): ?>
 
    <ul>
 
    <?php while( have_rows('etobicoke_hours_of_operation') ): the_row(); ?>
 
 <li><span class="day"><?php the_sub_field('day'); ?></span><span class="timings"><?php the_sub_field('timings'); ?></span></li>
        

        
    <?php endwhile; ?>
 
    </ul>
 
<?php endif; ?>
									
					</div>
				</div>
						</div>
						</div>
<!------------------------------------------------------------------------>
					<div class="col-md-6">
						<h5><a href="<?php the_field('mississauga_location_link');?>"><?php the_field('mississauga_location_title');?></a></h5>
						<div class="row">
					<div class="col-md-6 col-sm-12">
                    <div class="option2">
						
						<ul>
							<li><span><i class="fas fa-map-marker-alt"></i></span><span><?php the_field('mississauga_address');?></span></li>
							<li><span><img src="/wp-content/themes/crookedcue/assets/img/phoneicon.jpg"></span><span><b><a href="tel:<?php the_field('mississauga_phone');?>"><?php the_field('mississauga_phone');?></a></b></span></li>
								<li><span><i class="fab fa-instagram"></i></span><span><a href="https://www.instagram.com/<?php the_field('mississauga_insta_id');?>" target="_blank">@<?php the_field('mississauga_insta_id');?></a></span></li>

						</ul>
                        </div>
					</div>
<div class="col-md-6 col-sm-12">
                    <div class="option3">
                                       
                    <h6><i class="far fa-clock"></i>Hours of Operation:</h6>
                    
                    
	  <?php if( have_rows('mississauga_hours_of_operation') ): ?>
 
    <ul>
 
    <?php while( have_rows('mississauga_hours_of_operation') ): the_row(); ?>
 
 <li><span class="day"><?php the_sub_field('day'); ?></span><span class="timings"><?php the_sub_field('timings'); ?></span></li>
        

        
    <?php endwhile; ?>
 
    </ul>
 
<?php endif; ?>
						
                       </div>
				</div>
							 </div>
				</div>
<!----------------------------------------------------------------------->
				</div>
		</div>
	</section>
    <?php endwhile; endif; wp_reset_query(); ?>

<!-- -----------------------------------------Zigzag image section------------------------------------------------- -->
<section class="Zigzagimages">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6 col-md-6 left">
<div class="gallery-box">

				<h2 style="background:url(<?php the_field('gallery_category1_featured_image');?>); background-repeat:no-repeat; background-size:cover"><?php the_field('gallery_category1_title');?></h2>
                <div class="gallery-blurb">
                <div class="gb-info">
                <?php the_field('gallery_category1_blurb');?>
                <a href="<?php the_field('gallery_category1_link');?>" class="vg">view gallery</a>
                </div>
                </div>
                
                </div>
			</div>
				<div class="col-6 col-md-6 right">
                <div class="gallery-box">
            
					<h2 style="background:url(<?php the_field('gallery_category2_featured_image');?>); background-repeat:no-repeat; background-size:cover"><?php the_field('gallery_category2_title');?></h2>
                    <div class="gallery-blurb">
                <div class="gb-info">
               <?php the_field('gallery_category2_blurb');?>
                <a href="<?php the_field('gallery_category2_link');?>" class="vg">view gallery</a>
                </div>
                </div>
            
                </div>
				</div>
		</div>

		<div class="row">
								<div class="col-12 col-md-12">
                                <div class="gallery-box">
                                
						<h2 style="background:url(<?php the_field('gallery_category3_featured_image');?>); background-repeat:no-repeat; background-size:cover"><?php the_field('gallery_category3_title');?></h2>
                        <div class="gallery-blurb">
                        <div class="container">
                <div class="gb-info">
               <?php the_field('gallery_category3_blurb');?>
                <a href="<?php the_field('gallery_category3_link');?>" class="vg">view gallery</a>
                </div>
                </div></div>
                
                </div>
					</div>
					<div class="col-6 col-md-8" style="display:none">
                     <div class="gallery-box">
                    
						<h2 style="background:url(<?php the_field('gallery_category4_featured_image');?>); background-repeat:no-repeat; background-size:cover"><?php the_field('gallery_category4_title');?></h2>
                        <div class="gallery-blurb">
                <div class="gb-info">
                <?php the_field('gallery_category4_blurb');?>
                <a href="<?php the_field('gallery_category4_link');?>" class="vg">view gallery</a>
                </div>
                </div>
              
                </div>
					</div>
		</div>
	</div>
</section>
<!-- ------------------------------------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------------------------------------------- -->
<section class="ourHistory">
	
	<div class="container-fluid">
		<div class="row">
			
			<div class="col-md-6 align-self-center">
            <div class="oh-panel2">
            <img src="<?php the_field('our_history_mobile_featured_image');?>">
				<h4><?php the_field('our_history_heading');?></h4>
				<h2><?php the_field('our_history_title');?></h2>
		<?php the_field('our_history_blurb');?>
		<a href="<?php the_field('our_history_button_link');?>"><?php the_field('our_history_button_title');?></a>
        </div>
        <a href="<?php the_field('our_history_button_link');?>" class="btn"><?php the_field('our_history_button_title');?></a>
			</div>
<div class="col-md-6">
				<img class="ohthumb" src="<?php the_field('our_history_featured_image');?>" alt="snooker">
			</div>
		</div>
	</div>	
</section>

<!-- ------------------------------------------------------------------------------------------------- -->

<section class="partiesEvents" style="background-image:url(<?php the_field('corporate_functions_featured_image');?>)">
	<div class="container">

		<?php the_field('corporate_functions');?>
		<a href="<?php the_field('corporate_functions_button_url');?>"><?php the_field('corporate_functions_button_title');?></a>

	</div>
</section>

<!-- -------------------------------------------------------------------------------------------- -->

<section class="socialWall">
	<div class="container">
		<h2>social wall</h2>
		<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/socialWall.jpg" alt="social wall">
		<a href="#">Follow Us</a>
	</div>
</section>

<!-- ---------------------------------------------------------------------------------------- -->
<section class="Menues">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<h5><?php the_field('location1_title');?><span><a href="tel:4162367736">
                 (416) 236-7736</a></span></h5>
                 <?php if(get_field('location1_menu')): ?>

	<ul>

	<?php while(has_sub_field('location1_menu')): ?>

		<li><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a></li>
       
	<?php endwhile; ?>

	</ul>

<?php endif; ?>

			</div>
			<div class="col-md-4 col-sm-4">
				<h5><?php the_field('location2_title');?><span><a href="tel:905271-7665">
(905) 271-7665</a></span></h5>

<?php if(get_field('location2_menu')): ?>

	<ul>

	<?php while(has_sub_field('location2_menu')): ?>

		<li><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a></li>
       
	<?php endwhile; ?>

	</ul>

<?php endif; ?>
			</div>
			<div class="col-md-4 col-sm-12 align-self-center">
				<ul>
					<li><a href="<?php the_field('get_a_table_button_link');?>"><?php the_field('get_a_table_button_title');?></a></li>
					<li><a href="<?php the_field('event_planning_button_link');?>"><?php the_field('event_planning_button_title');?></a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- ----------------------------------------------- -->

<div class="greybg" style="display:none">
<section>
	<div class="container ">
		<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/googleReview.jpg" alt="review ">
	</div>
</section>
<!-- ------------------------------------------- -->
<section class="ourAwards">
	<div class="container">
		<div class="awardInner">
		<h2><?php the_field('awards_title');?></h2>
        
        <?php if(get_field('award')): ?>

	<ul>

	<?php while(has_sub_field('award')): ?>
    
    <li>
				<h3><?php the_sub_field('award_year'); ?></h3>
<?php the_sub_field('award_blurb'); ?>
</li>


	<?php endwhile; ?>

	</ul>

<?php endif; ?>

			

<div class="winnerText">	
		<h4><?php the_field('award_sub_title');?></h4>
			<?php the_field('award_blurb');?>
		</div>
	</div>
	</div>
</section>
</div>

<?php
get_footer();