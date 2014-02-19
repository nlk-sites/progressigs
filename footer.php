<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package PROGRESSIGS
 * @since PROGRESSIGS 1.0
 */
?>

		<div id="footer">
			<div class="bottom_boxes">
				<div class="b_box b1"><span>Join The Community</span><iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FProgressigs&amp;send=false&amp;layout=button_count&amp;width=50&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:21px;" allowTransparency="true"></iframe></div>
				<div class="b_box b2"><span>Spread The Word</span> <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
				<div class="b_box b3"><span>Plus This</span><?php echo do_shortcode('[wdgpo_plusone show_count="no"]'); ?></div>
				<div class="b_box b4"><span>Blog</span> <a href="<?php bloginfo('url'); ?>/category/blog"><img src="<?php echo get_childTheme_url(); ?>/images/ico_blog.gif" alt=""></a></div>
				<!--div class="b_box b5">
					<form action="#" class="join_form">
					<fieldset>
						<input type="text" class="input_email" value="enter your email">
						<input type="submit" class="input_join" value="join">
					</fieldset>
					</form>
                    
				</div-->
                <?php dynamic_sidebar('signup'); ?>
				<div class="cl"></div>
			</div>
			
			<div class="foot_block">
				<div class="foot_clo1">
					<div class="foot_links2">
					<?php
                        $menu = wp_nav_menu( array( 'container' => false, 'theme_location' => 'footnav1', 'echo' => false ));
                        preg_match_all('/class="(.*?)"/',$menu,$matches2);
                          $a=1;
                          if (preg_match_all('#(<a [^<]+</a>)#',$menu,$matches)) {
                              $hrefpat = '/(href *= *([\"\']?)([^\"\' ]+)\2)/';
                              foreach ($matches[0] as $link) {
                                 if (preg_match($hrefpat,$link,$hrefs)) {
                                    $href = $hrefs[1];
                                 }
                                 if (preg_match('#>([^<]+)<#',$link,$names)) {
                                    $name = $names[1];
                                 }
                                 $nav.= '<a '.$href.' '.$matches2[0][$a].'>'.$name.'</a>'.'|';
                                 $a++;
                              }
                              echo substr_replace($nav, '&nbsp;', -1) ;
                           }
                        ?>                    
					</div>
					<div class="foot_links1">
					<?php
						$nav = NULL;
                        $menu = wp_nav_menu( array( 'container' => false, 'theme_location' => 'footnav2', 'echo' => false ));
                        preg_match_all('/class="(.*?)"/',$menu,$matches2);
                          $a=1;
                          if (preg_match_all('#(<a [^<]+</a>)#',$menu,$matches)) {
                              $hrefpat = '/(href *= *([\"\']?)([^\"\' ]+)\2)/';
                              foreach ($matches[0] as $link) {
                                 if (preg_match($hrefpat,$link,$hrefs)) {
                                    $href = $hrefs[1];
                                 }
                                 if (preg_match('#>([^<]+)<#',$link,$names)) {
                                    $name = $names[1];
                                 }
                                 $nav.= '<a '.$href.' '.$matches2[0][$a].'>'.$name.'</a>'.'|';
                                 $a++;
                              }
                              echo substr_replace($nav, '&nbsp;', -1) ;
                           }
                        ?>
                        <div id="kblinks">
                        <?php
						if ( false === ( $special_query_results = get_transient( 'prog_kb_posts' ) ) ) {
							$kbs = get_posts(array(
								'numberposts' => -1,
								'category' => 25,
							));
							$o = '';
							foreach ( $kbs as $i => $k ) {
								if ( $i > 0 ) $o .= '|';
								$o .= '<a href="'. get_permalink($k->ID) .'">'. esc_attr($k->post_title) .'</a>';
							}
							set_transient( 'prog_kb_posts', $o, 60*60*12 );
						}
						// Use the data like you would have normally...
						$o = get_transient( 'prog_kb_posts' );
						echo $o;
						?>
                        </div>
					</div>
					<div class="foot_links1">
						<span>
                        <?php
							echo '&copy; '. date('Y') .' PROGRESSIGS ALL RIGHT RESERVED';
                        ?>
                        </span> |
					<?php
						$nav = NULL;
                        $menu = wp_nav_menu( array( 'container' => false, 'theme_location' => 'footnav3', 'echo' => false ));
                        preg_match_all('/class="(.*?)"/',$menu,$matches2);
                          $a=1;
                          if (preg_match_all('#(<a [^<]+</a>)#',$menu,$matches)) {
                              $hrefpat = '/(href *= *([\"\']?)([^\"\' ]+)\2)/';
                              foreach ($matches[0] as $link) {
                                 if (preg_match($hrefpat,$link,$hrefs)) {
                                    $href = $hrefs[1];
                                 }
                                 if (preg_match('#>([^<]+)<#',$link,$names)) {
                                    $name = $names[1];
                                 }
                                 $nav.= '<a '.$href.' '.$matches2[0][$a].'>'.$name.'</a>'.'|';
                                 $a++;
                              }
                              echo substr_replace($nav, '&nbsp;', -1) ;
                           }
                        ?>   
					</div>
				</div><!--end of foot_clo1-->
				
				<div class="foot_clo2">
					<?php
						if ( false === ( $special_query_results = get_transient( 'prog_fdisc' ) ) ) {
							$o = get_post_meta(146, 'footer_text', true);
							set_transient( 'prog_fdisc', $o, 60*60*12 );
						}
						// Use the data like you would have normally...
						$o = get_transient( 'prog_fdisc' );
						echo $o;
						?>
				</div><!--end of foot_clo2-->
			</div>
		</div><!--end of footer-->
	</div>	
    <?php
		wp_footer();
	?>
    <style type="text/css">.hotel_coral { visibility : visible!important }</style>
	</body>
</html>
