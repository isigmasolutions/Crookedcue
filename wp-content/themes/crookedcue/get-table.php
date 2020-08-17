<?php 
/* Template Name: Get a Table
*/ 
?>
<?php get_header('inner'); ?>

<section class="innerbanner our-mene-banner" style="background-image:<?php if(get_field('banner_image')) { the_field('banner_image'); } else { bloginfo('template_url');?>/assets/images/our-menu-banner.jpg <?php } ?>">
		<div class="mainHeading">
			<h1><?php the_title('');?></h1>
		
		</div>
	</section>

<div class="main-page get-table">

<div class="row">
<?php 
while ( have_posts() ) : the_post();
the_content();
endwhile;
?>
<div style="clear:both"></div>

   <?php  
if (get_field('locations')) {
while (has_sub_field('locations')) {
?>
<div class="col-md-6 column" style="background-image:url(<?php the_sub_field('location_image');?>)">
<img src="<?php the_sub_field('location_image');?>" alt="" class="location-image" />
<div class="content-box">
  <h2><?php the_sub_field('location_title');?></h2>

</div>
<div class="over-view">
<div class="box">
<h2><?php the_sub_field('location_title');?></h2>
<p><?php the_sub_field('location_address');?></p>
<div class="action"><a href="<?php the_sub_field('location_link');?>"><?php the_sub_field('link_name');?></a></div>

</div>
</div>
</div>

<?php } } ?>
</div>

    
<?php get_footer(); ?>