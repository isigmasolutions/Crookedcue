 <div class="our-menu" style="">
<ul class="etobicoke-menu">
<?php

$testimoniallist = new WP_Query('posts_per_page=-1&post_type=etobicoke_menu&orderby=menu_order&order=ASC');
if($testimoniallist->have_posts()) : while($testimoniallist->have_posts()): $testimoniallist->the_post();

?>
<li class="nav-btn <?php the_id();?>" data-row-id="menu<?php the_id();?>"><?php the_title();?></li>
<script>
jQuery(document).ready(function(){
 jQuery(".<?php the_id();?>").click(function(){
	 jQuery(".panel-collapse").removeClass("show");
  jQuery("#collapse<?php the_id();?>").addClass("show");
	var top = jQuery("#collapse<?php the_id();?>").first().offset().top -145;
jQuery('html, body').animate({scrollTop: top+'px'}, 300);
 });
});
</script>
<?php endwhile; endif; wp_reset_query(); ?>
</ul>
</div>

<div id="foodmenu" class="main-page our-menu-list">
<div class="container">
 <div class="panel-group menu-item" id="accordion" role="tablist" aria-multiselectable="true">
          <?php

$testimoniallist = new WP_Query('posts_per_page=-1&post_type=etobicoke_menu&orderby=menu_order&order=ASC');
if($testimoniallist->have_posts()) : while($testimoniallist->have_posts()): $testimoniallist->the_post();

?>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php the_id();?>" aria-expanded="false" aria-controls="collapse<?php the_id();?>">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <?php the_title();?>
                    </a>
                </h4>
            </div>
            <div id="collapse<?php the_id();?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                     <?php the_content();?>
                </div>
            </div>
        </div>
<?php endwhile; endif; wp_reset_query(); ?>
    </div><!-- panel-group -->
    </div>
    </div>