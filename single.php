<?php
/**
 * The Template for displaying all single posts.
 *
 * @package PROGRESSIGS
 * @since PROGRESSIGS 1.0
 */

$post = $wp_query->post;
$parent_cat = get_parent_category();
if ( in_category('25') || $parent_cat == '25' ) { include(STYLESHEETPATH . '/single-kb.php'); }
else { include(STYLESHEETPATH . '/single-blog.php'); }
