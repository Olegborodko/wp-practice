<?php

if (have_posts()) {
  while (have_posts()) {
    the_post();
    ?>
    <article <?php post_class(); ?> id="post-<?php the_ID() ?>">
      <h1>
        <?= get_the_title() ?>
      </h1>
      <div>
        <?= get_the_content() ?>
      </div>
      <a href="<?= get_the_permalink() ?>">
        Read More
      </a>
      <?php
  }
}