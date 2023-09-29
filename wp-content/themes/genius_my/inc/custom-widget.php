<?php
class mycustom_widget extends WP_Widget
{
  function __construct()
  {
    parent::__construct(

      // WIDGET ID
      'mycustom_widget',

      // WIDGET NAME
      __('MyCustom Widget', 'mycustom_widget_domain'),

      // Widget description
      array('description' => __('Sample widget based for custom widget tutorial', 'mycustom_widget'), )

    );

  }

  public function widget($args, $instance)
  {

    $title = apply_filters('widget_title', $instance['title']);

    // before and after widget arguments are defined by themes
    echo $args['before_widget'];

    if (!empty($title))
      echo $args['before_title'] . $title . $args['after_title'];

    // This is where you run the code and display the output
    echo __('Hello user, we are delighted to have you here!', 'mycustom_widget_domain');

    echo $args['after_widget'];
  }

  public function form($instance)
  {

    if (isset($instance['title']))
      $title = $instance['title'];
    else
      $title = __('Default Title', 'mycustom_widget_domain');

    ?>

    <p>

      <label for="<?php echo $this->get_field_id('title'); ?>">
        <?php _e('Title:'); ?>
      </label>

      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
        name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />

    </p>

    <?php

  }

  public function update($new_instance, $old_instance)
  {
    $instance = array();

    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

    return $instance;
  }

}