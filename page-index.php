<?php

/**

 * Template Name: Homepage

 *

 * @package PROGRESSIGS

 * @since PROGRESSIGS 1.0

 */



get_header(); ?>



		<div class="index_slide">

			<ul>

               <?php while(the_repeater_field('homepage_images')) { ?>

                    <li><img src="<?php echo get_sub_field('homepage_image'); ?>" alt="<?php echo get_sub_field('homepage_image_alt_text'); ?>"></li>

               <?php } ?>                

			</ul>

		</div>

		

		

		

		<div id="index_content">

			<div class="intro_holder">

				<div class="single_intro"><a href="<?php bloginfo('url'); ?>/products-page/rechargeables/"><img src="<?php echo get_childTheme_url(); ?>/images/intro1.png" alt="" width="320" height="270" /><span class="hotel_coral">KITS</span></a></div>

				<div class="single_intro"><a href="<?php bloginfo('url'); ?>/products-page/cartridges"><img src="<?php echo get_childTheme_url(); ?>/images/intro2.png" alt="" width="356" height="270" /><span class="hotel_coral">CARTRIDGES</span></a></div>

				<div class="single_intro last_intro"><a href="<?php bloginfo('url'); ?>/products-page/non-rechargeables"><img src="<?php echo get_childTheme_url(); ?>/images/intro3.png" alt="" width="272" height="270" /><span class="hotel_coral">DISPOSABLES</span></a></div>

			</div>

			

			<div class="why_box">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>   

				<h1><?php the_title(); ?></h1>

				<?php the_content(); ?>

               

                <div class="highlight_txt">

                <?php while(the_repeater_field('taglines')) { ?>

                	<span class="hotel_coral"><?php echo get_sub_field('tagline'); ?></span>

                <?php } ?> 

                </div>

            <?php endwhile; endif; ?>

			</div><!--end of why_box-->

			

			<div class="special_txt">

				<p class="txt1 hotel_coral">TARLESS</p>

				<p class="txt2">"Means no tar in your lungs"</p>

				<p class="txt3 hotel_coral">ODORLESS</p>

				<p class="txt4">"No smokers stench left behind"</p>

				<p class="txt5 hotel_coral">SMOKE FREE</p>

				<p class="txt6">"No second hand smoke"</p>

				<p class="txt7 hotel_coral">BE YOURSELF</p>

			</div>

			

			

		</div><!--end of index_content-->

		<div class="cl"></div>



<?php get_footer(); ?>