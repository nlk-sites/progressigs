<?php
/**
 * Template Name: Products pages
 *
 * @package PROGRESSIGS
 * @since PROGRESSIGS 1.0
 */

get_header();
?>
		<div id="content">
        	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div id="package_intro">
            	<div id="package_intro_photo"><?php the_post_thumbnail(); ?></div>
                <h1 class="hotel_coral"><?php the_title(); ?></h1>
				<?php the_content(); ?>
            </div>
            <?php endwhile; ?>
			<div id="text_big">
            	<img src="<?php echo get_field('meta1_image'); ?>" width="474" height="334" alt=""/>
                <div class="text_in">
                	<h3><?php echo get_field('meta1_title'); ?></h3>
					<?php echo get_field('meta1_content'); ?>
                </div>
            </div>
			<?php while(the_repeater_field('product_box')) { ?>
            <div class="big_box <?php if(get_sub_field('bottom_line')=='No') echo "big_box_noline"; ?>">
            	<h2><?php echo get_sub_field('box_title'); ?></h2>
                <?php if(get_sub_field('box_text')): ?>
                <p class="big_text">
                	<?php echo get_sub_field('box_text'); ?>
                </p>
                <?php endif; ?>
                <?php if(get_sub_field('box_image_1')): ?>
                <div class="boxes">
                	<div class="box">
                    	<img src="<?php echo get_sub_field('box_image_1'); ?>" width="319" height="269" alt="" />
                        <p><?php echo get_sub_field('box_image_1_text'); ?></p>
                    </div>
                	<div class="box">
                    	<img src="<?php echo get_sub_field('box_image_2'); ?>" width="319" height="269" alt="" />
                        <p><?php echo get_sub_field('box_image_2_text'); ?></p>
                    </div>
                	<div class="box last_box">
                    	<img src="<?php echo get_sub_field('box_image_3'); ?>" width="319" height="269" alt="" />
                        <p><?php echo get_sub_field('box_image_3_text'); ?></p>
                    </div> 
                    <br class="cl"/>                                       
                </div>
                <?php endif; ?>
            </div>
            <?php } ?>
			<div class="cl"></div>
		</div><!--end of content-->
<?php get_footer(); ?>
