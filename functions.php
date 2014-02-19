<?php
/**
 * @package PROGRESSIGS
 * @since PROGRESSIGS 1.0
 */

add_action( 'after_setup_theme', 'progressigs_setup' );

if ( ! function_exists( 'progressigs_setup' ) ):
function progressigs_setup() {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'large', 596, 397, true );
	add_image_size( 'prodL', 310, 310, true );
	add_image_size( 'prod3', 190, 190, true );
	add_image_size( 'thm', 70, 70, true );
	
	register_nav_menus( array(
		'mainmenu' => 'Main Menu',
		'footnav1' => 'Footer Links Area 1',
		'footnav2' => 'Footer Links Area 2',
		'footnav3' => 'Footer Links Area 3',
		'unreasonable' => 'Unreasonable Sidebar',
	));
	
	add_action( 'widgets_init', 'progressigs_widgets_init' );
	add_action('wp_print_scripts', 'progressigs_js');
}
endif;

function progressigs_widgets_init() {
	register_sidebar(array(
		'name' => 'Blog sidebar',
		'id' => 'blog_side',
		'description' => 'Sidebar for the Blog area',
		'before_widget' => '<div class="%1$s %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="side_title">',
		'after_title' => '</div><div class="side_box">'
	));
	register_sidebar(array(
		'name' => 'Knownledge base sidebar',
		'id' => 'kb',
		'description' => 'Sidebar for the Knownledge base area',
		'before_widget' => '<div class="%1$s %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="side_title">',
		'after_title' => '</div><div class="side_box">'
	));
	register_sidebar(array(
		'name' => 'Email Signup',
		'id' => 'signup',
		'description' => 'Email Signup Form here',
		'before_widget' => '<div class="b_box b5 join_form">',
		'after_widget' => '</div>',
		'before_title' => '<div style="display:none">',
		'after_title' => '</div>'
	));
}

function get_childTheme_url() {
    return get_stylesheet_directory_uri();
}

//Make Wp E-commerce use page template
add_action('wpsc_swap_the_template', 'include_shop');

function include_shop() {
    global $wp_query,$wpsc_query;

    $products_page_id = wpec_get_the_post_id_by_shortcode('[productspage]');
    $term = get_query_var( 'wpsc_product_category' );
    $tax_term = get_query_var ('product_tag' );
    $obj = $wp_query->get_queried_object();
    $id = isset( $obj->ID ) ? $obj->ID : null;

    if( get_query_var( 'post_type' ) == 'wpsc-product' || $term || $tax_term || ( $id == $products_page_id )){

	$shop_template = trailingslashit(STYLESHEETPATH) . 'page-list_products.php';
	require_once($shop_template);
	die;
    }
}
//Shortcodes
function faq_wrap($atts, $content = null) {
	extract(shortcode_atts(array(
		"href" => 'http://'
	), $atts));
	
	return '<ul class="aq_list">'.do_shortcode($content).'</ul>';
}
add_shortcode("faq_wrap", "faq_wrap");

function faq_item($atts, $content = null) {
	extract(shortcode_atts(array(
		"num" => '',
		"title" => ''
	), $atts));
	
	return '<li><a href="#"><strong>'.$num.'.</strong> '.$title.'</a><div class="hidden_text">'.$content.'</div></li>';
}
add_shortcode("faq_item", "faq_item");

//find parent category
function get_parent_category() {
	global $wp_query;
	$category = $wp_query->get_queried_object();
	if ($category->category_parent) return $category->category_parent;
	else return $category->cat_ID;
}

function progressigs_wpsc_unique_names( $names ) {
	if ( is_array($names) == false ) $names = Array();
	
	$names[] = 'dateofbirth';
	return $names;
}
add_filter('wpsc_add_unique_names' , 'progressigs_wpsc_unique_names');

function progressigs_wpsc_form_types( $types ) {
	if ( is_array($types) == false ) $types = Array();
	
	$types['Date of Birth'] = 'dateofbirth';
	return $types;
}
add_filter('wpsc_add_form_types' , 'progressigs_wpsc_form_types');

function progressigs_wpsc_validate_dob( $states ) {
	//$states = array( 'is_valid' => !$any_bad_inputs, 'error_messages' => $bad_input_message );
	$wpsc_checkout = new wpsc_checkout();
	foreach ( $wpsc_checkout->checkout_items as $form_data ) {
		if ( $form_data->type == 'dateofbirth' ) {
			$bdayok = true;
			$dob_m = intval($_POST['collected_data'][$form_data->id]['month']);
			$dob_d = intval($_POST['collected_data'][$form_data->id]['day']);
			$dob_y = intval($_POST['collected_data'][$form_data->id]['year']);
			if ( $form_data->mandatory == 1 ) {
				if ( ( $dob_m == -1 ) || ( $dob_d == -1 ) || ( $dob_y == -1 ) ) {
					$_SESSION['wpsc_checkout_error_messages'][$form_data->id] = sprintf(__( 'Please enter your <span class="wpsc_error_msg_field_name">%s</span>.', 'wpsc' ), esc_attr($form_data->name) );
					$_SESSION['wpsc_checkout_saved_values'][$form_data->id] = '';
					$states['is_valid'] = false;
					$bdayok = false;
				}
				$this_m = intval(date('n'));
				$this_d = intval(date('j'));
				$this_y = intval(date('Y'));
				// check if 18
				if ( ( $dob_y > ($this_y - 18) ) || ( ( $dob_y == ($this_y - 18) ) && ( ( $dob_m > $this_m ) || ( $dob_d > $this_d ) ) ) ) {
					$_SESSION['wpsc_checkout_error_messages'][$form_data->id] = __( 'You must be at least 18 to purchase.', 'wpsc' );
					$_SESSION['wpsc_checkout_saved_values'][$form_data->id] = '';
					$states['is_valid'] = false;
					$bdayok = false;
				}
			}
			if ( $bdayok ) {
				$_SESSION['wpsc_checkout_saved_values'][$form_data->id] = array(
					'month' => $dob_m,
					'day' => $dob_d,
					'year' => $dob_y,
				);
			}
		}
	}
	return $states;
}
add_filter('wpsc_checkout_form_validation' , 'progressigs_wpsc_validate_dob');

function progressigs_admin_init() {
	if ( function_exists('wpsc_core_load_checkout_data') ) wpsc_core_load_checkout_data(); //reset
}
add_action('admin_init', 'progressigs_admin_init');

function progressigs_js() {
	if ( ! is_admin() ) {
		$sur = get_childTheme_url();
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', $sur .'/js/jquery-1.7.min.js');
		wp_enqueue_script( 'jquery.cycle', $sur .'/js/jquery.cycle.all.min.js', array('jquery'));
		wp_enqueue_script( 'jquery.uniform', $sur .'/js/jquery.uniform.min.js', array('jquery'));
		wp_enqueue_script( 'superfish', $sur .'/js/superfish.js', array('jquery'));
		wp_enqueue_script( 'progressigs.js', $sur .'/js/scripts.js', array('jquery','jquery.cycle','jquery.uniform','superfish'));
	}
}

function progressigs_pub_page_transients($p_id) {
	
	// various transients on various pages / page templates
	$post = get_post($p_id);
	
	if ( is_page(146) ) {
    	delete_transient( 'prog_times' );
    	delete_transient( 'prog_fdisc' );
	}
}
add_action( 'publish_page', 'progressigs_pub_page_transients' );

function progressigs_pub_post_transients($p_id) {
	
	// various transients on various pages / page templates
	//$post = get_post($p_id);
	
	delete_transient( 'prog_kb_posts' );
}
add_action( 'publish_post', 'progressigs_pub_post_transients' );


function progressigs_product_transients($post_id) {
	$transname = 'prog_pvars_'. $post_id;
    delete_transient( $tname );
}
add_action( 'publish_wpsc-product', 'progressigs_product_transients' );

function progo_summary( $morelink, $limit = 250 ) {
	global $post;
	$content = wp_kses($post->post_content, array('p'=>array(),'br'=>array(),'ul'=>array(),'li'=>array()));
	$lbrat = strpos( $content, "~" );
	$content = substr( $content, 0, strrpos( substr( $content, 0, $limit ), ' ' ) ) ."...";
	if( $lbrat > 0 && $lbrat < $limit ) {
		$content = substr( $content, 0, $lbrat );
	}
	if( $morelink != false ) {
		$content .= "\n<a href='". ( function_exists('wpsc_the_product_permalink') ? wpsc_the_product_permalink() : '#') ."' class='more-link'>$morelink</a>";
	}
	echo wpautop($content);
}
