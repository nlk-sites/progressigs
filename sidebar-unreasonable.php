<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package PROGRESSIGS
 * @since PROGRESSIGS 1.0
 */
?>
<div class="right_column">
    <img src="<?php echo get_childTheme_url(); ?>/images/unreasonable_side_title.png" width="287" height="295" alt="" />

	<?php
	if ( is_page_template('page-unreasonable.php') ) {
	wp_nav_menu(array(
		'theme_location' => 'unreasonable',
		'container' => false,
	));
	}
        /*
		if($post->post_parent)
          $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0&sort_column=menu_order");
          else
          $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&sort_column=menu_order");
          if ($children) { ?>
          <ul>
          <?php echo $children; ?>
          </ul>
    <?php }*/
	
	
			if ( is_page('nmi-cc') ) dynamic_sidebar('checkout');
	?>      
</div><!--right_column-->
