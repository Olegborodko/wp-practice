<?php
/**
 * Template name: Homepage Template
 */
get_header();
echo "<br><br>";
echo "============";
echo "<br><br>";

$wp_query = new WP_Query(array('posts_per_page' => -1));
while ($wp_query->have_posts()):
  $wp_query->the_post(); ?>
  <h1>
    <?php the_title(); ?>
  </h1>
  <p>
    <?php the_content(); ?>
  </p>
<?php endwhile;
?>