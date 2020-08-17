<?php
/**
/* Template Name: Home Template
 *
 * @package WordPress 
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header('inner'); ?>

<!-- --------------------------------------------------------------- -->
	<section class="Banner" style="background:url(<?php the_field('banner_image');?>) no-repeat; background-size:cover">
		<div class="mainHeading">
			<?php the_field('banner_content');?>
            <div class="BnrBtn"><a href="<?php the_field('banner_button_url');?>"><?php the_field('banner_button_title');?></a>
				<a href="<?php the_field('banner_button_another _url');?>"><?php the_field('banner_button_another _title');?></a></div>
            
		</div>
	</section>
<!-- --------------------------------------------------------------- -->
      	<section class="optionsLogo">
		<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-12">
                    <div class="option1">
						<ul>
							<li><span><i class="fas fa-map-marker-alt"></i></span><span><?php the_field('address_info');?></span></li>
						</ul>
                        </div>
					</div>
					
					<div class="col-md-4 col-sm-12">
                    <div class="option2">
						<ul>
							<li><span><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/phoneicon.jpg"></span><span><b><a href="tel:<?php the_field('contact_number');?>"><?php the_field('contact_number');?></a></b></span></li>
							<li><span><i class="fab fa-instagram"></i></span><span><a href="<?php the_field('instagram_url');?>"><?php the_field('instagram_id');?></a></span></li>

						</ul>
                        </div>
					</div>
					<div class="col-md-4 col-sm-12">
                    <div class="option3">
                 			<ul>
							<li><span><i class="far fa-clock"></i></span><span><b>Hours of Operation:</b></span></li>
							<li><span class=""></span><span><?php the_field('opening_time');?></span></li>
						</ul>
                        </div>
					</div>
				</div>
		</div>
	</section>
<!-- ------------------------------------------------------------------------------------------------------------- -->
<!-- -----------------------------------------Zigzag image section------------------------------------------------- -->
<section class="Zigzagimages">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6 col-md-8">
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
				<div class="col-6 col-md-4">
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
								<div class="col-6 col-md-4">
                                <div class="gallery-box">
                                
						<h2 style="background:url(<?php the_field('gallery_category3_featured_image');?>); background-repeat:no-repeat; background-size:cover"><?php the_field('gallery_category3_title');?></h2>
                        <div class="gallery-blurb">
                <div class="gb-info">
               <?php the_field('gallery_category3_blurb');?>
                <a href="<?php the_field('gallery_category3_link');?>" class="vg">view gallery</a>
                </div>
                </div>
                
                </div>
					</div>
					<div class="col-6 col-md-8">
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
<!-- -------------------------------------------------------------------------------------------- -->
<section class="partiesEvents" style="background-image:url(<?php the_field('corporate_functions_featured_image');?>)">
	<div class="container">

		<h2><?php the_field('corporate_functions_title');?></h2>
		<a href="<?php the_field('corporate_functions_button_url');?>"><?php the_field('corporate_functions_button_title');?></a>

	</div>
</section>
<!------------our history--------------------  -->

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

<div class="greybg">
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