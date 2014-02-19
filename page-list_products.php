<?php
/**
 * Template Name: Listing Products
 *
 * @package PROGRESSIGS
 * @since PROGRESSIGS 1.0
 */

get_header();
?>
		<div id="content">
        	<div id="single_product">
				<a href="<?php bloginfo('url'); ?>/support"><img src="<?php echo get_childTheme_url(); ?>/images/free_shipping.png" width="484" height="39" class="free_shipping" alt="" /></a>
            	<h1 class="hotel_coral">GETTING STARTED</h1>
                <div id="list_products">
					<?php
					global $wp_query;
                    if ( ( $wp_query->is_single == 1 ) && ( $wp_query->query_vars['post_type'] == 'wpsc-product' ) ) {
						include('wpsc-single_product.php');
					} else {
					if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                    	<?php the_content(); ?>
                    <?php endwhile;
					}
					?>
                </div><!--list-products-->            
	
    			<?php get_sidebar('products'); ?>
    
                <br class="cl" />
            </div><!--single_product-->
			<div class="cl">
			
		</div><!--end of content-->

<?php get_footer(); ?>
