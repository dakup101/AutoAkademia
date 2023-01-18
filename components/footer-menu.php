<?php
$args = wp_parse_args($args, array(
  'menu' => null,
  'class' => null
));
$menu = wp_get_menu_array($args['menu']);
?>
<ul class="<?php echo $args['class'] ?>">
  <?php foreach ($menu['menus'] as $item) : ?>
    <li class="menu-item">
      <a href="<?php echo $item['url'] ?>">
        <?php echo $item['title'] ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>