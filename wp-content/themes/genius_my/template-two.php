<?php
/**
 * Template name: Two Template
 */
// get_header();
?>

<div>
  <?php
  $args = array(
    'post_type' => 'car',
    'post_per_page' => -1,

  );

  $cars = new WP_Query($args);

  while ($cars->have_posts()):
    $cars->the_post(); ?>
    <h1>
      <?php the_title(); ?>
    </h1>
    <p>
      <?php the_content(); ?>
    </p>
  <?php endwhile;
  wp_reset_postdata(); //!
  ?>

  <hr>
  <br />
  <br />

  <?php
  unset($args);
  $args = array(
    'post_type' => 'post',
    'post_per_page' => -1,
  );

  $posts = new WP_Query($args);

  while ($posts->have_posts()):
    $posts->the_post(); ?>
    <h1>
      <?php the_title(); ?>
    </h1>
    <p>
      <?php the_content(); ?>
    </p>
  <?php endwhile;
  wp_reset_postdata(); //!
  ?>

  <hr>
  <br />
  <br />

  <?php
  unset($args);
  $args = array(
    'post_type' => 'car',
    'order' => 'ASC',
    'tax_query' => array(
      'relation' => 'OR',
      array(
        'taxonomy' => 'brand',
        'field' => 'slug',
        'terms' => array('mercedes', 'bmw'),
      ),
      array(
        'taxonomy' => 'manufactures',
        'field' => 'slug',
        'terms' => array('2019'),
      ),
    )
  );

  $posts = new WP_Query($args);

  while ($posts->have_posts()):
    $posts->the_post(); ?>
    <h1>
      <?php the_title(); ?>
    </h1>
    <p>
      <?php the_content(); ?>
    </p>
  <?php endwhile;
  wp_reset_postdata(); //!
  ?>

</div>

<?php
// get_footer();
?>