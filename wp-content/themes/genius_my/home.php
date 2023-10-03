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

  echo '<br/>';
  echo '<br/>';
  echo '<br/>';
  posts_nav_link(' . ', esc_html__('Prev', 'geniuscourse'), esc_html__('Next', 'geniuscourse'));

  echo '<br/>';
  echo '<br/>';
  echo '<br/>';
  ?>
    <div class="pagination">
      <div class="prev">
        <?php
        previous_posts_link(esc_html__('Prev', 'geniuscourse'));

        // $t = get_previous_posts_link( esc_html__('Prev', 'geniuscourse'));
        // var_dump($t);
        ?>
      </div>
      <div class="next">
        <?php
        next_posts_link(esc_html__('Next', 'geniuscourse'))
          ?>
      </div>
    </div>
    <?php

    echo '<br/>';
    echo '<br/>';
    echo '<br/>';

    the_posts_pagination(
      array(
        'prev_text' => esc_html__('Prev', 'geniuscourse'),
        'next_text' => esc_html__('Next', 'geniuscourse'),
      )
    );

    echo '<br/>';
    echo '<br/>';
    echo '<br/>';

    echo paginate_links();

  // для того что-бы делить контент страницы на части
  // есть еще такие функции
  // previous_post_link();
  // next_post_link();
  // the_post_navigation();
  // the_comments_navigation();
}