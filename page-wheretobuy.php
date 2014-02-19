<?php
/**
 * Template Name: Where to Buy
 *
 * @package PROGRESSIGS
 * @since PROGRESSIGS 1.0
 */

get_header();
?>
		<div id="content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="cont_title2"><div class="hotel_coral"><?php the_title(); ?></div></div>

			<?php get_sidebar('contact'); ?>

			<?php the_content(); ?>
			
			<div class="cl"></div>
		<?php endwhile; endif; ?>	
		</div><!--end of content-->

<?php get_footer(); ?>
