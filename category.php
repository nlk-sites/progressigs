<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package PROGRESSIGS
 * @since PROGRESSIGS 1.0
 */

get_header(); ?>

		<div id="content">
			<div class="cont_title1_type2"><div class="hotel_coral"><?php echo single_cat_title( '', false ); ?></div></div>
			<div class="main_content">
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="blog_block">
					<h1 class="kb_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<?php the_excerpt(); ?>
				</div><!--end of blog_block-->
            <?php endwhile; ?>
				
			<?php if ( $wp_query->max_num_pages > 1 ) : ?>
            <div class="page_control">
                <div class="btn_prev"><?php next_posts_link('&lt; Previous') ?></div>
                <div class="btn_next"><?php previous_posts_link('Next &gt;') ?></div>
            </div>
            <?php endif; ?>                
				
			</div><!--end of main_content-->
			
            
            <?php get_sidebar('kb'); ?>
			
			<div class="cl"></div>
			
		</div><!--end of content-->

<?php get_footer(); ?>
