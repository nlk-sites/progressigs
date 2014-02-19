<?php
/**
 * The Template for displaying all single BLOG posts.
 *
 * @package PROGRESSIGS
 * @since PROGRESSIGS 1.0
 */

get_header(); ?>

		<div id="content">
			<div class="cont_title1"><div class="hotel_coral">blog</div></div>
			<div class="main_content">
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="blog_block">
					<h1><?php the_title(); ?></h1>
					<div class="blog_info"><?php progo_posted_on(); ?></div>
					<?php the_content(); ?>
				</div><!--end of blog_block-->
            <?php endwhile; ?>
				
				
			</div><!--end of main_content-->
			
			<?php get_sidebar('blog'); ?>
			
			<div class="cl"></div>
			
		</div><!--end of content-->

<?php get_footer(); ?>
