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
<section class="innerbanner" style="background:url(/wp-content/uploads/2020/06/blog.jpg) no-repeat center; background-size:cover">
		<div class="mainHeading">
			<h1>Blog</h1>
		
		</div>
	</section>
    
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<div class="container">


<div class="row">

<div class="col-md-9">
<div class="blog-detail">
<div class="blog-desc">
<div class="info">
<span class="date"><?php echo get_the_date('F j, Y'); ?></span> <span class="author">By: <span><?php the_author(); ?></span></span>
</div>
</div>

<h3 class="title"><?php the_title();?></h3>
<div class="featured-thumb">
<?php the_post_thumbnail('full');?>
</div>
<?php the_content();?>
</div>
</div>

<div class="col-md-3">

<div class="sidebar">

<div class="grid1">
<form role="search" method="get" class="search-form" action="/">
                
                    <input type="search"
                class="search-field"
                placeholder="Search"  
                value="" name="s"
                title="Search efter:">
                
            </form>
            </div>
            
<div class="grid2">
<h4>Categories</h4>
<?php $categories = get_categories( array(
    'orderby' => 'name',
    'parent'  => 0
) );
 
foreach ( $categories as $category ) {
    printf( '<a href="%1$s">%2$s</a>',
        esc_url( get_category_link( $category->term_id ) ),
        esc_html( $category->name )
    );
}?>


</div>     

<div class="grid3">
<h4>Archives</h4>
<ul>
<?php 
$args = array(
    'type'            => 'monthly',
    'limit'           => '',
    'format'          => 'html', 
    'before'          => '',
    'after'           => '',
    'show_post_count' => false,
    'echo'            => 1,
    'order'           => 'DESC'
);
wp_get_archives( $args );
?>
</ul>
</div>       
            

</div>

</div>

</div>

			
   </div>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();