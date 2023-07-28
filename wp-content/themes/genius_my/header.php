<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package genius_my
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php get_template_part('parts/part')?>

<?php get_template_part('parts/part', 'one')?>

<? //добавить файл parts/part-two.php ?>
<?php get_template_part('parts/part', 'two')?>

<?php wp_body_open(); ?>

<?php
  wp_nav_menu(
    array(
    'theme_location' => 'header_nav',
    'menu_class' => 'test',
    'container' => 'div',
    )
  );
?>

<?php
$name = esc_html__('Hello', 'genius_my');
echo $name;

esc_html_e('Hello', 'genius_my');

echo '<br/>'.wp_kses(__('text <b> text </b>', 'genius_my'), array('b' => array()));

echo "<br>";
$rating = 4;
printf(esc_html(_n('%s start', '%s stars', $rating, 'genius_my')), $rating);
?>