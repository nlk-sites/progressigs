<?php
/**
 * The Template for displaying all single KNOWLEDGE BASE posts.
 *
 * @package PROGRESSIGS
 * @since PROGRESSIGS 1.0
 */

get_header(); ?>

		<div id="content">
			<div class="cont_title1_type2"><div class="hotel_coral">knowledge base</div></div>
			<div class="main_content">
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="blog_block">
					<h1 class="kb_title"><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div><!--end of blog_block-->
            <?php endwhile; ?>
				
				
			</div><!--end of main_content-->
			
			<?php get_sidebar('kb'); ?>
			
			<div class="cl"></div>
			
		</div><!--end of content-->

<?php get_footer(); ?>
