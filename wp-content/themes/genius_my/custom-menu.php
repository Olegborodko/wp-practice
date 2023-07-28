<?php
$menu_items = wp_get_nav_menu_items('custom-menu');

if ($menu_items) {
  echo '<ul>';
  foreach ($menu_items as $menu_item) {
    echo '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
  }
  echo '</ul>';
}
?>