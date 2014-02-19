<?php
/**
 * Sidebar for Blog areas.
 *
 * @package PROGRESSIGS
 * @since PROGRESSIGS 1.0
 */
?>

<div class="sidebar">
  <?php dynamic_sidebar( 'kb' ); ?>
  <?php
  ob_start();

  //$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
  // if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
  //   $number = 10;

  $r = new WP_Query(array('posts_per_page' => 25, 'no_found_rows' => true, 'post_status' => 'publish', 'cat' => 25, 'ignore_sticky_posts' => true));
  if ($r->have_posts()) :
    ?>
    <?php //echo $before_widget; ?>
    <div class="side_title">Knowledge Base</div>
    <div class="side_box">
      <ul>
        <?php  while ($r->have_posts()) : $r->the_post(); ?>
        <li><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></li>
        <?php endwhile; ?>
      </ul>
    </div>
    <?php
    // Reset the global $the_post as this query will have stomped on it
    wp_reset_postdata();

  endif;

  $content = ob_get_flush();
  ?>
</div><!--end of sidebar-->
