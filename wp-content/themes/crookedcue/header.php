<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" >
			<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/bootstrap.min.css">
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
			<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/bootstrap.min.js" ></script>
			<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/style1.css">
   
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<!-- <a class="skip-link screen-reader-text" href="#content"><?php //_e( 'Skip to content', 'twentyseventeen' ); ?></a> -->
<div class="headerContainerWrapper">
  <div class="headerContainerShadow">
	<div class="headerContainer">

	<header class="header">
            <?php

$testimoniallist = new WP_Query('posts_per_page=-1&post_type=header&orderby=menu_order&order=ASC');
if($testimoniallist->have_posts()) : while($testimoniallist->have_posts()): $testimoniallist->the_post();

?>
		<div class="topNav">
		<div class="row">
			<div class="col-md-4  align-self-center">
				<a href="<?php the_field('find_a_location_link');?>" class="location"><?php the_field('find_a_location_title');?></a>
			</div>
			<div class="col-md-4 ">
            <?php if ( get_theme_mod( 'themeslug_logo' ) ) { ?>

<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' alt=""><img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a><a class="map-locations Etobicoke" href="https://www.google.com/maps/dir//3056+Bloor+St+W,+Etobicoke,+ON+M8X+2Y8,+Canada/@43.6471226,-79.5175147,16z/data=!4m9!4m8!1m0!1m5!1m1!1s0x882b3654829cad4f:0x92776c38a815b7be!2m2!1d-79.5131373!2d43.6471227!3e0" target="_blank" style="display:none">Directions</a>
<a class="map-locations Mississauga" href="https://www.google.com/maps/dir//The+Crooked+Cue,+Port+Credit,+Mississauga,+75+Lakeshore+Rd+E,+Mississauga,+Ontario,+Canada/@43.5526175,-79.6543097,12z/data=!4m9!4m8!1m0!1m5!1m1!1s0x882b4672eac71641:0x3a91926cdaa01953!2m2!1d-79.5842694!2d43.5526389!3e0" target="_blank" style="display:none">Directions</a><div id="showmenu"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/menu.png"></div>

<?php } ?>
			</div>
			<div class="col-md-4  align-self-center">
				<a href="<?php the_field('get_a_table_link');?>" class="getTable"><?php the_field('get_a_table_title');?></a>
			</div>
		</div>
	</div>
    <?php endwhile; endif; wp_reset_query(); ?>
    <div class="megamenu" style="display:none">
    <div class="row">
    <?php

$testimoniallist = new WP_Query('posts_per_page=-1&post_type=global&orderby=menu_order&order=ASC');
if($testimoniallist->have_posts()) : while($testimoniallist->have_posts()): $testimoniallist->the_post();

?>
     <div class="col-sm-3">
    <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well">
              <li class="active"><a href="#vtab1" data-toggle="tab"><?php the_field('etobicoke_location_title');?><span><?php the_field('etobicoke_phone');?></span></a></li>
              
              <li><a href="#vtab2" data-toggle="tab"><?php the_field('mississauga_location_title');?><span><?php the_field('mississauga_phone');?></span></a></li>
            </ul>
    
    </div>
   <?php endwhile; endif; wp_reset_query(); ?>   
    <div class="col-sm-9">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="vtab1">
                <div class="row">

<div class="col-sm-4">
    <?php

$testimoniallist = new WP_Query('posts_per_page=-1&post_type=global&orderby=menu_order&order=ASC');
if($testimoniallist->have_posts()) : while($testimoniallist->have_posts()): $testimoniallist->the_post();

?>
<img src="<?php the_field('etobicoke_location_featured_thumb');?>">
<?php endwhile; endif; wp_reset_query(); ?>
</div>     
                  <?php

$testimoniallist = new WP_Query('posts_per_page=-1&post_type=header&orderby=menu_order&order=ASC');
if($testimoniallist->have_posts()) : while($testimoniallist->have_posts()): $testimoniallist->the_post();
?>               
<div class="col-md-2 col-xl-2">
                 
    <div class="mgm-menu">
    <?php if(get_field('quick_links_etobicoke')): ?>

	<ul>

	<?php while(has_sub_field('quick_links_etobicoke')): ?>

    <li><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a></li>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>

    </div>
  
    </div>
      <?php endwhile; endif; wp_reset_query(); ?>
      
     <div class="col-md-3 col-xl-3">
             <?php

$testimoniallist = new WP_Query('posts_per_page=-1&post_type=global&orderby=menu_order&order=ASC');
if($testimoniallist->have_posts()) : while($testimoniallist->have_posts()): $testimoniallist->the_post();

?>
     <div class="mgm-col3">
     <div class="social"> 
							<ul>
						<li style="display:none">Follow Us</li>
						<li style="display:none">
						<ul class=" socialinner">
							<li><a href="<?php the_field('facebook');?>"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/facebook.png"></a></li>
							<li><a href="<?php the_field('instagram');?>"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/instagram.png"></a></li>
							<li><a href="<?php the_field('yelp');?>"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/yelp.png"></a></li>
							<li><a href="<?php the_field('tripadvisor');?>"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/tripadvisor.png"></a></li>
							<li><a href="<?php the_field('group');?>"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/Group.png"></a></li>
						</ul>
					</li>
						<li><?php the_field('reservations_are_recommended_title');?></li>
						<li><a href="<?php the_field('booking_button_url_etobicoke');?>"><?php the_field('booking_button_title');?></a></li>
						<!--<li><a href="<?php //the_field('privacy');?>">Privacy</a>  |  <a href="<?php //the_field('terms');?>">Terms</a></li>-->

					</ul></div>
                    </div>
         <?php endwhile; endif; wp_reset_query(); ?>            
    </div>
    
     <div class="col-md-2 col-xl-3">
                   <?php

$testimoniallist = new WP_Query('posts_per_page=-1&post_type=global&orderby=menu_order&order=ASC');
if($testimoniallist->have_posts()) : while($testimoniallist->have_posts()): $testimoniallist->the_post();

?>

     <div class="mgm-col4">
     
<h6><i class="far fa-clock"></i>Hours of Operation:</h6>
  <?php if( have_rows('etobicoke_hours_of_operation') ): ?>
 
    <ul>
 
    <?php while( have_rows('etobicoke_hours_of_operation') ): the_row(); ?>
 
 <li><span class="day"><?php the_sub_field('day'); ?></span><span class="timings"><?php the_sub_field('timings'); ?></span></li>
        

        
    <?php endwhile; ?>
 
    </ul>
 
<?php endif; ?>
     
                        </div>
                        <?php endwhile; endif; wp_reset_query(); ?>   
    </div>
                    
                    
                </div>  </div>
                
                               
                
                
                
                <div role="tabpanel" class="tab-pane fade" id="vtab2">
                <div class="row">

                  <div class="col-sm-4">
    <?php

$testimoniallist = new WP_Query('posts_per_page=-1&post_type=global&orderby=menu_order&order=ASC');
if($testimoniallist->have_posts()) : while($testimoniallist->have_posts()): $testimoniallist->the_post();

?>
<img src="<?php the_field('mississauga_location_featured_thumb');?>">
<?php endwhile; endif; wp_reset_query(); ?>
</div>
                                <?php

$testimoniallist = new WP_Query('posts_per_page=-1&post_type=header&orderby=menu_order&order=ASC');
if($testimoniallist->have_posts()) : while($testimoniallist->have_posts()): $testimoniallist->the_post();

?>
                  <div class="col-md-2 col-xl-2">
                   
    <div class="mgm-menu">
    <?php if(get_field('quick_links_mississauga')): ?>

	<ul>

	<?php while(has_sub_field('quick_links_mississauga')): ?>

    <li><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a></li>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>

    </div></div>
    <?php endwhile; endif; wp_reset_query(); ?>
    
    
     <div class="col-md-3 col-xl-3">
             <?php

$testimoniallist = new WP_Query('posts_per_page=-1&post_type=global&orderby=menu_order&order=ASC');
if($testimoniallist->have_posts()) : while($testimoniallist->have_posts()): $testimoniallist->the_post();

?>
     <div class="mgm-col3">
     <div class="social">
							<ul>
						<li style="display:none">Follow Us</li>
						<li style="display:none">
						<ul class=" socialinner">
							<li><a href="<?php the_field('facebook');?>"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/facebook.png"></a></li>
							<li><a href="<?php the_field('instagram');?>"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/instagram.png"></a></li>
							<li><a href="<?php the_field('yelp');?>"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/yelp.png"></a></li>
							<li><a href="<?php the_field('tripadvisor');?>"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/tripadvisor.png"></a></li>
							<li><a href="<?php the_field('group');?>"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/Group.png"></a></li>
						</ul>
					</li>
						<li><?php the_field('reservations_are_recommended_title');?></li>
						<li><a href="<?php the_field('booking_button_url_mississauga');?>"><?php the_field('booking_button_title');?></a></li>
						<!--<li><a href="<?php //the_field('privacy');?>">Privacy</a>  |  <a href="<?php //the_field('terms');?>">Terms</a></li>-->

					</ul></div>
                    </div>
         <?php endwhile; endif; wp_reset_query(); ?>            
    </div>
    
     <div class="col-md-2 col-xl-3">
                   <?php

$testimoniallist = new WP_Query('posts_per_page=-1&post_type=global&orderby=menu_order&order=ASC');
if($testimoniallist->have_posts()) : while($testimoniallist->have_posts()): $testimoniallist->the_post();

?>

     <div class="mgm-col4">
     
<h6><i class="far fa-clock"></i>Hours of Operation:</h6>
  <?php if( have_rows('mississauga_hours_of_operation') ): ?>
 
    <ul>
 
    <?php while( have_rows('mississauga_hours_of_operation') ): the_row(); ?>
 
 <li><span class="day"><?php the_sub_field('day'); ?></span><span class="timings"><?php the_sub_field('timings'); ?></span></li>
        

        
    <?php endwhile; ?>
 
    </ul>
 
<?php endif; ?>
     
                        </div>
                        <?php endwhile; endif; wp_reset_query(); ?>   
    </div></div>
            </div></div>
        </div>
        
       
    </div>
    </div>
	</header>
    
    </div>
    </div>
    </div>


	<div class="site-content-contain">
		<div id="content" class="site-content">