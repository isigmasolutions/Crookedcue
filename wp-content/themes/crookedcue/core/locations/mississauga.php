<?php 


    $term_id  = 26;
    $taxonomy = 'product_cat';

    // Get subcategories of the current category
    $terms    = get_terms([
        'taxonomy'    => $taxonomy,
        'hide_empty'  => true,
        'parent'      => 26
    ]);

    $output = '';

    // Loop through product subcategories WP_Term Objects
    foreach ( $terms as $term ) { 
        $term_link = get_term_link( $term, $taxonomy );

        $catid =  $term->term_id;

if($term->name === 'Preferred Restaurant Area'){
?>


<!-- ----------------------------Restaurant Area---------------------------------- -->
				<div class="RestaurantArea" id="<?php echo str_replace(' ', '', $term->name);?>">
					<h3>Preferred Restaurant Area</h3>
					
							<?php echo do_shortcode('[product_table category="'.$catid.'" columns="add-to-cart ,name,description,image,price" lightbox="false" links="none" ]');?>
					
				</div>
<!-- ----------------------------Restaurant Area Ends---------------------------------- -->
<?php } else {?>

<div class="menuMain">
<h3 class="accordion" alt="<?php echo $catid;?>"><?php echo $term->name;?></h3>

<!-- -----------------appatizer menu--------------------- -->
<div class="menu panel" id="<?php echo str_replace(' ', '', $term->name);?>">
    <div class="white-bg">
        <div class="row">
        <!-- <div class="col-sm-12 appendquickview <?php echo 'appendshortcode'.$catid; ?>">
            <?php //echo do_shortcode('[product_table category="'.$catid.'" columns="name,description,price,add-to-cart" lightbox="false" links="none" show_quantity="true" ]');?>
            
        </div> -->
<?php
        $args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'category' => $term->term_id
    //'posts_per_page' => 5,
);
$arr_posts = new WP_Query( $args );
 
if ( $arr_posts->have_posts() ) :
 
    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
        $post_id = get_the_id();
        $product = wc_get_product( $post_id );
        $qty = $post_id;
       // echo $product->get_regular_price();
        //echo $product->get_sale_price();
        $price =  $product->get_price(); ?>
<div class="col-sm-12 fornewstyle">

        <div class="col-sm-9">
            <ul>
                
                <li><strong><?php the_title(); ?> <a href="#" target="_blank" class="camraicn"><i class="fas fa-camera"></i></a></strong><br/><span class="discrip"><?php echo substr(get_the_content(), 0, 100);?></span></li>
                <li><h4>$<?php echo $price; ?></h4></li>
            </ul>
        </div>
<div class="col-sm-3">
    <ul>
        <?php if($product->get_type() != 'variable'){ ?>
        <li><input value="1" type="number" placeholder="1" name="" min="1" max="" class="clickeonqty" alt="<?php echo $qty; ?>"></li>
    <?php } ?>
        <li><?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
    sprintf( '<a data-quantity="1" href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="updateqty'.$qty.' button %s product_type_%s">%s</a>',
        esc_url( ($product->get_type() != 'variable') ? $product->add_to_cart_url() : '#' ),
        esc_attr( $product->get_id() ),
        esc_attr( $product->get_sku() ),
        $product->is_purchasable() ? 'add_to_cart_button' : '',
        esc_attr( ($product->get_type() != 'variable') ? $product->get_type().' ajax_add_to_cart orderBtn' : 'hideselectbox' ),
        esc_html( $product->add_to_cart_text() )
    ),
$product );

        if($product->get_type() == 'variable'){
        echo '<a data-product-id="'.$post_id.'" class="quick_view button orderBtn">
        <span>Quick View</span></a>';
    }
    ?></li>
    </ul>
</div>
</div>
<?php 

    endwhile;
endif;


?>






    </div>
</div>
<!-- ------------------------------------------------------------- -->
    
</div>
    </div>
    <?php } } wp_reset_postdata(); ?>
	<script>
var acc = document.getElementsByClassName("accordion");
var panel = document.getElementsByClassName('panel');

for (var i = 0; i < acc.length; i++) {
    acc[i].onclick = function() {
    	var setClasses = !this.classList.contains('active');
        setClass(acc, 'active', 'remove');
        setClass(panel, 'show', 'remove');
        
       	if (setClasses) {
            this.classList.toggle("active");
            this.nextElementSibling.classList.toggle("show");
        }
    }
}

function setClass(els, className, fnName) {
    for (var i = 0; i < els.length; i++) {
        els[i].classList[fnName](className);
    }
}

</script>
<style>
.accordion::after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}
.accordion.active::after {
    content: "\2212";
}
div.panel {
    display: none;
}

div.panel.show {
    display: block !important;
}
</style>