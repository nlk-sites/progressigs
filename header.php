<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package PROGRESSIGS
 * @since PROGRESSIGS 1.0
 */
?>
<!doctype html>

	<head>
		<title><?php
if ( function_exists('get_wpseo_options') ) {
	wp_title('');
} else {
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
}
	?></title>
		
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
			
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


		<?php wp_head(); ?>
        <script type="text/javascript"><?php
				if ( false === ( $special_query_results = get_transient( 'prog_times' ) ) ) {
					$slidetime = get_post_meta('146', 'slider_speed', true);
					$slidetime = $slidetime * 1000;
					$tagtime = get_post_meta('146', 'taglines_speed', true);
					$tagtime = $tagtime * 1000;
					$o = 'slidetime = '. absint($slidetime) .'; tagtime = '. absint($tagtime) .';';
					set_transient( 'prog_times', $o, 60*60*12 );
				}
				// Use the data like you would have normally...
				$o = get_transient( 'prog_times' );
				echo $o;
			?></script>
    </head> 
	<?php 
		if(is_front_page()){
			$add_class = 'home_body';
		} else {
			$add_class = 'body_inside';
		}
	?>
	<body <?php body_class($add_class); ?>>
	<div class="body_inside">
		<div id="header">
			<div class="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_childTheme_url(); ?>/images/logo.png" alt=""></a></div>
            
            <?php
            $post_type = get_post_type(get_the_ID());
            
            if($post_type != 'wpsc-product' && (is_single() || is_category())) :
            ?>
            
                <div class="head_bar">
                    <a href="#" class="bar_link">shopping cart<?php if ( function_exists('wpsc_cart_item_count') ) echo ' <span>('. wpsc_cart_item_count() .')</span>'; ?></a>
                </div>   
                         
            <?php else: ?>
            
                <div class="head_bar">
                    <div class="head_txt"><img src="<?php echo get_childTheme_url(); ?>/images/txt_design.png" alt=""></div>
                    <div class="lang">
                        <span><img src="<?php echo get_childTheme_url(); ?>/images/flag_us.png" alt="">us</span>
                        <ul>
                            <li><a href="http://progressigs.de"><img src="<?php echo get_childTheme_url(); ?>/images/flag_de.png" alt="">de</a></li>
                        </ul>
                    </div>
                    <!-- <span class="gap_line"></span>
                    <a href="<?php bloginfo('url'); ?>/store/your-account" class="bar_link">my account</a> -->
                    <span class="gap_line"></span>
                    <a href="<?php bloginfo('url'); ?>/store/checkout" class="bar_link">shopping cart<?php if ( function_exists('wpsc_cart_item_count') ) echo ' <span id="hcartcount">('. wpsc_cart_item_count() .')</span>'; ?></a>
                </div>
                
            <?php endif; ?>
			<?php wp_nav_menu( array( 'container' => 'false', 'theme_location' => 'mainmenu', 'menu_class' => 'nav', 'fallback_cb' => 'progo_nav_fallback' ) ); ?>			
			<div class="cl"></div>
		</div><!--end of header-->
