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

		</div><!-- #content -->

		<!-- ------------------------------------------- -->
        <?php

$testimoniallist = new WP_Query('posts_per_page=-1&post_type=global&orderby=menu_order&order=ASC');
if($testimoniallist->have_posts()) : while($testimoniallist->have_posts()): $testimoniallist->the_post();

?>
<footer class="footer">
	<div class="container">
		<div class="row">
					<div class="col-md-4 col-sm-6">
						<h3><?php the_field('location1_title');?></h3>
						<ul>
							<li><span><i class="fas fa-map-marker-alt"></i></span> <span> <?php the_field('location1_address');?></span></li>
							<li><span><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/Group842@2x1.png"></span><span><a href="tel:<?php the_field('location1_contact_number');?>"><?php the_field('location1_contact_number');?></a></span></li>
							<li><span><i class="far fa-envelope"></i></span><span><a href="mailto:<?php the_field('location1_email_address');?>"> <?php the_field('location1_email_address');?></a></span></li>
							<li><a href="<?php the_field('location1_buttton_url');?>" class="TableBtn"><?php the_field('location1_button_title');?></a></li>
							
						</ul>
					</div>
					
					<div class="col-md-4 col-sm-6">
						<div class="Middle">
						<h3><?php the_field('location2_title');?></h3>

						<ul>
							<li><span><i class="fas fa-map-marker-alt"></i></span> <span> <?php the_field('location2_address');?></span></li>							<li><span><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/Group842@2x1.png"></span><a href="tel:<?php the_field('location2_contact_number');?>"><?php the_field('location2_contact_number');?></a></li>
							<li><span><i class="far fa-envelope"></i></span><span><a href="mailto:<?php the_field('location2_email_address');?>"><?php the_field('location2_email_address');?></a></span></li>
							<li><a href="<?php the_field('location2_buttton_url');?>" class="TableBtn"><?php the_field('location2_button_title');?></a></li>

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

					</div>
				</div>
				</div>
	</div>
</footer>
<div class="copyRight"><p><?php the_field('copyright');?></p></div>
<?php endwhile; endif; wp_reset_query(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<!-- <script src="<?php //bloginfo( 'template_directory' ); ?>/assets/js/jquery.hashchange.min.js"></script>
<script src="<?php //bloginfo( 'template_directory' ); ?>/assets/js/PageScroll2id.js" ></script> -->
<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/custom.js" ></script>
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
