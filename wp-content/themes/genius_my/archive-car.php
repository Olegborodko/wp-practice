<?php

if (have_posts()) {
  ?>
  <header class="page-header">
    <?php
    the_archive_title('<h1 class="page-title">', '</h1>');
    the_archive_description('<div class="archive-description">', '</div>');
    ?>
  </header>

  <?php
  $paged = get_query_var('paged') ? get_query_var('paged') : 1;
  $cars = new WP_Query([
    'post_type' => 'car',
    'posts_per_page' => 2,
    'paged' => $paged,
  ]);

  while ($cars->have_posts()) {
    $cars->the_post();
    echo "ID=> " . get_the_ID();
    echo "<br>";
    echo "Title=> " . get_the_title();
    echo "<br>";
    ?>

    <a href="<?= get_the_permalink() ?>">
      Read More
    </a>
    <?php
    echo "<br>";
    echo "============";
    echo "<br>";
  }

  echo "<br/>";
  echo "<br/>";
  echo paginate_links(
    array(
      'base' => get_pagenum_link(1) . '%_%',
      'format' => '/page/%#%',
      'current' => max(1, get_query_var('paged')),
      'total' => $cars->max_num_pages,
      'prev_text' => __('« prev'),
      'next_text' => __('next »'),
    )
  );
}