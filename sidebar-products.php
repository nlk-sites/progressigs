<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package PROGRESSIGS
 * @since PROGRESSIGS 1.0
 */
?>
<div id="product_sidebar">

	<?php
    $sidebar = '';
    if ( is_page() ) {
        global $post;
        $custom = get_post_meta($post->ID,'_progo_sidebar');
        $sidebar = $custom[0];
    }
    if ( $sidebar == '' ) {
        $sidebar = 'main';
    }
    dynamic_sidebar( $sidebar );
    // do SHOPPING CART widget ?
    ?>
    <div id="advantages">
        <h3 class="he1 hotel_coral">TARLESS</h3>
        <p class="he1">"Means no tar in your lungs"</p>
        <h3 class="he2 hotel_coral">ODORLESS</h3>
        <p class="he2">"No smokers stench left behind"</p>
        <h3 class="he3 hotel_coral">SMOKE FREE</h3>
        <p class="he3">"No second hand smoke"</p>     
        <h3 class="he4 hotel_coral">BE YOURSELF</h3>                                                                 
    </div>
    
</div><!--product-sidebar-->
