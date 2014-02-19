<?php
/**
 * Template Name: Support page
 *
 * @package PROGRESSIGS
 * @since PROGRESSIGS 1.0
 */

get_header();
?>
		<div id="content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="cont_title2"><div class="hotel_coral"><?php the_title(); ?></div></div>
            
            <?php while(the_repeater_field('support_boxes')) { ?>
			<div class="sup_box">
				<div class="sup_img"><img src="<?php echo get_sub_field('support_image'); ?>" alt=""></div>
				<div class="sup_txt">
					<h2><?php echo get_sub_field('support_title'); ?></h2>
					<?php echo get_sub_field('support_content'); ?>
				</div>
			</div><!--end of sup_box-->
            <?php } ?> 
			
			<div class="aq_holder">
				<div class="cont_title3"><div class="hotel_coral">FREQUENTLY ASKED QUESTIONS </div></div>
				<div class="aq_title">Click on any question below to instantly view the answer.</div>            
				<?php the_content(); ?>
			</div><!--end of aq_holder-->
			
			<div class="cl"></div>
		<?php endwhile; endif; ?>	
		</div><!--end of content-->

<?php get_footer(); ?>
