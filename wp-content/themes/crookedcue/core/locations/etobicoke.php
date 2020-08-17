<?php 


    $term_id  = 27;
    $taxonomy = 'product_cat';

    // Get subcategories of the current category
    $termsE    = get_terms([
        'taxonomy'    => $taxonomy,
        'hide_empty'  => true,
        'parent'      => 27
    ]);

    $output = '';

    // Loop through product subcategories WP_Term Objects
    foreach ( $termsE as $termE ) { 
        $term_link = get_term_link( $termE, $taxonomy );

        $catid =  $term->term_id;

if($term->name === 'Preferred Restaurant Area'){
?>


<!-- ----------------------------Restaurant Area---------------------------------- -->
				<div class="RestaurantArea" id="E<?php echo str_replace(' ', '', $termE->name);?>">
					<h3>Preferred Restaurant Area</h3>
					
							<?php echo do_shortcode('[product_table category="'.$catid.'" columns="add-to-cart ,name,description,image,price" lightbox="false" links="none" ]');?>
					
				</div>
<!-- ----------------------------Restaurant Area Ends---------------------------------- -->
<?php } else {?>

<div class="menuMain">
<h3 class="accordion"><?php echo $termE->name;?></h3>

<!-- -----------------appatizer menu--------------------- -->
<div class="menu panel" id="E<?php echo str_replace(' ', '', $termE->name);?>">
    <div class="white-bg">
        <div class="row">
        <div class="col-sm-12 appendquickview">
            <?php echo do_shortcode('[product_table category="'.$catid.'" columns="name,description,price,add-to-cart" lightbox="false" links="none" show_quantity="true" ]');?>
            
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------- -->
    
</div>
    </div>
    <?php } } ?>
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