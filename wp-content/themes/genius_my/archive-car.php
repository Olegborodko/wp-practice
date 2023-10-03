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
  while (have_posts()) {
    the_post();
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
  echo paginate_links();
}