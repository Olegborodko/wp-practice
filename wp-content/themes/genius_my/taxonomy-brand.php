<?php
get_header();

$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));

print_r($term);

echo "<br>";
echo $term->name;

echo "<br>";
echo "<br>";

if (have_posts()) {
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
}