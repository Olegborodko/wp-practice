<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package genius_my
 */

?>

<?php
  wp_nav_menu(
    array(
    'menu' => '3', // id slug or name
    // 'theme_location' => 'footer_nav',
    'menu_class' => 'myClass',
    'container' => 'div',
    'container_class' => 'myContainerClass',
    'depth' => '1', // sub menu
    )
  );
?>

<?php wp_footer(); ?>

</body>
</html>
