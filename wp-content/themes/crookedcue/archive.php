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
			<h1><?php single_month_title(' ') ?></h1>
		
		</div>
	</section>
    
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<div class="container">

<div class="filter">
<div class="row">
<div class="col-md-4">
<select name="event-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'> 
    <option value=""><?php echo esc_attr(__('Categories')); ?></option> 

    <?php 
        //$option = '<option value="' . get_option('home') . '/blog">All Categories</option>'; // change category to your custom page slug
        $categories = get_categories(); 
        foreach ($categories as $category) {
            $option .= '<option value="'.get_option('home').'/category/'.$category->slug.'">';
            $option .= $category->cat_name;
            $option .= ' ('.$category->category_count.')';
            $option .= '</option>';
        }
        echo $option;
    ?>
</select>
</div>
<div class="col-md-4">
<select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
<option value=""><?php echo attribute_escape(__('Archives')); ?></option>
<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?> </select>
</div>
<div class="col-md-4">
<form role="search" method="get" class="search-form" action="/">
                
                    <input type="search"
                class="search-field"
                placeholder="Search"  
                value="" name="s"
                title="Search efter:">
                
            </form>
</div>
</div>
</div>
	<div class="blog-listing">
    <div class="row">
    
    
   <?php 
		   
		   if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
      
      <div class="col-md-4">
      <div class="list-box">
<div class="blog-thumb">      
 <?php if ( has_post_thumbnail() ) {
the_post_thumbnail('full');
} else { ?>
<img src="/wp-content/uploads/2020/06/featured-thumb.jpg" alt="<?php the_title(); ?>" />
<?php } ?>
</div>
<div class="blog-desc">
<div class="info">
<span class="date"><?php echo get_the_date('F j, Y'); ?></span> <span class="author">By: <span><?php the_author(); ?></span></span>
</div>
<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<a class="btn btn-primary" href="<?php the_permalink(); ?>" title="Read more">Read more</a>
</div>

</div>
</div>
 
        <?php endwhile; ?>

        
                         
           <?php if(function_exists('wp_paginate')) {
wp_paginate();
}

?>   
     
        
        
         <?php endif; wp_reset_query();?>
    

    
    </div>
    
    </div>		
   </div>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();