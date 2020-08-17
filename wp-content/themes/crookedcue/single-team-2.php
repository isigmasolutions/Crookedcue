<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
 
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
		<div class="featured-post alignleft">
						 <?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}
						else {
						 ?>
						<?php } ?>
						</div>
							<?php
							while ( have_posts() ) : the_post(); 
							the_content();
							endwhile;	
							?>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();