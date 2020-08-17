<?php 
/* Template Name: Contact Us
*/ 
?>
<?php get_header('inner'); ?>

<section class="innerbanner our-mene-banner" style="background-image:<?php if(get_field('banner_image')) { the_field('banner_image'); } else { bloginfo('template_url');?>/assets/images/our-menu-banner.jpg <?php } ?>">
  <div class="mainHeading">
    <h1>
      <?php the_title('');?>
    </h1>
  </div>
</section>
<div class="main-page contact-page">
  <div class="container">
    <div class="row">
    <div class="col-md-7">
     <div class="title-section">
          <h3 class="title">Get in touch</h3>
        </div>
          <div class="contact-form">
		  
          <?php 
while ( have_posts() ) : the_post();
the_content();
endwhile;
?>
          </div>
    </div>
      
      
      <div class="col-md-5">
       <h3><?php the_field('location_title');?></h3>
        
        <div class="block_contact_address">
        <div class="text_address">
        <?php the_field('location_address');?>
          
        </div>
        <div class="block_info_hours">
        <?php the_field('location_hours');?>
          
        </div>
        </div>
        <p><?php the_field('location_info');?></p>
      </div>
      
    

    </div>
  </div>
  </div>

     <div class="google-map">
          <?php the_field('location_google_map');?>
        </div>
  
  <div class="clear"></div>
<?php get_footer(); ?>