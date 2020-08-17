<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header('inner'); ?> 
<section class="innerbanner">
		<div class="mainHeading">
			<?php if ( have_posts() ) : ?>
			<h1 class="page-title">
			<?php
			/* translators: Search query. */
			printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' );
			?>
			</h1>
		<?php else : ?>
			<h1 class="page-title"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
		<?php endif; ?>
		
		</div>
	</section>
    
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<div class="container">
			
            <div class="search-results">
      <?php if(have_posts()) : while(have_posts()) : ?>
        <?php the_post(); ?>
        <div class="result">
         <div class="blog-desc">
    <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
    <?php the_excerpt();?>
<a class="btn btn-primary" href="<?php the_permalink(); ?>" title="Read more">Read more</a>
    </div>
    </div>

    <?php endwhile; ?>
     <?php if(function_exists('wp_paginate')) {
wp_paginate();
}

?>   
    <?php else : ?>
      <!-- Display "Product not found" message here -->

<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
         <?php endif; wp_reset_query();?>
</div>    
</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();