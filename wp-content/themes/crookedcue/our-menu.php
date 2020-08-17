<?php 
/* Template Name: Our Menu
*/ 
?>
<?php get_header('inner'); ?>

<section class="innerbanner our-mene-banner" style="background-image:<?php if(get_field('banner_image')) { the_field('banner_image'); } else { bloginfo('template_url');?>/assets/images/our-menu-banner.jpg <?php } ?>">
		<div class="mainHeading">
			<h1><?php the_title('');?></h1>
		
		</div>
	</section>

<div class="our-menu">
<?php the_field('our_menu','options');?>
</div>

<div class="main-page our-menu-list">
    <div class="container">
      <div class="row">
        
        <div class="col-md-12">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
   <?php  
if (get_field('menu_option')) {
$i=1;
while (has_sub_field('menu_option')) {
?>

  <div class="menu-panel" id="menu<?php echo $i;?>">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="tgl" data-parent="#accordion" href="#collapse<?php echo $i;?>" aria-expanded="false"></i>
        <?php the_sub_field('title');?></a>
      </h4>
    </div>
    <div id="collapse<?php echo $i;?>" class="panel-collapse collapse">
      <div class="panel-body">​<?php the_sub_field('menu_content');?></div>
    </div>
  </div></div>
  
  <?php $i++;} } ?>
        </div>
        
      </div>
    </div>
  </div>
  <script>
$(".nav-btn").click(function(){		
		$(this).addClass("active");
		$(this).siblings().removeClass("active");	
		var i = $(this).index();
		var name = $(this).attr("data-row-id");
		var id = "#" + name;
     
		var top = $(id).first().offset().top -145;			
		$('html, body').animate({scrollTop: top+'px'}, 300);
		
	});
	</script>
<?php get_footer(); ?>