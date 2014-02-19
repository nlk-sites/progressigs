<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package PROGRESSIGS
 * @since PROGRESSIGS 1.0
 */

get_header();
?>
		<div id="content">
			<div class="left_column">
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            	<h1 class="hotel_coral unreasonable_title"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			<?php endwhile; ?>
            </div><!--left_column-->

			<?php get_sidebar('unreasonable'); ?>

			<div class="cl"></div>
			
		</div><!--end of content-->

<?php get_footer(); ?>
