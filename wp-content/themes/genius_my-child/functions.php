<?php

if (!defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

function enqueue_child_styles1()
{
  // Подключаем стили дочерней темы
  // wp_enqueue_style('child-style-1', get_stylesheet_uri(), array(), _S_VERSION);

  // Стиль родительской темы
  // wp_enqueue_style('parrent-style-2', get_stylesheet_uri(), array('parent-style'));
}

add_action('wp_enqueue_scripts', 'enqueue_child_styles1');

add_image_size('image-name',240, 240, true);
//нельзя называть size - thumb, thumbnail, medium, large, post-thumbnail
//название, ширина, высота, и если стоит false то высоту wp будет делать пропорциональную,
//если true то обрежит