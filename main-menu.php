<?php
  $menu_name = 'primary-menu';
  $locations = get_nav_menu_locations();
  $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
  $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>

<nav>
<ul class="primary-menu">
    <?php
    $count = 0;
    $submenu = false;
    foreach( $menuitems as $item ):
        $link = $item->url;
        $title = $item->title;
        // item does not have a parent so menu_item_parent equals 0 (false)
        if ( !$item->menu_item_parent ):
        // save this id for later comparison with sub-menu items
        $parent_id = $item->ID;
    ?>

    <li class="item">
        <a href="<?php echo $link; ?>" class="title">
            <?php echo $title; ?>
        </a>
    <?php endif; ?>

        <?php if ( $parent_id == $item->menu_item_parent ): ?>

            <?php if ( !$submenu ): $submenu = true; ?>
            <ul class="sub-menu">
            <?php endif; ?>

                <li class="item">
                    <a href="<?php echo $link; ?>" class="title"><?php echo $title; ?></a>
                </li>

            <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
            </ul>
            <?php $submenu = false; endif; ?>

        <?php endif; ?>

    <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
    </li>                           
    <?php $submenu = false; endif; ?>

<?php $count++; endforeach; ?>

</ul>
</nav>