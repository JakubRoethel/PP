<?php // Specify the menu location for which you want to display the menu items
$linki = explode('/',$_SERVER['REQUEST_URI']);
if ($linki[1] == 'en') {
    $menuLocation = 'Top menu en';
} else {
    $menuLocation = 'Top menu';
}
  
  // Get the menu items for the specified menu location
  $menuItems = wp_get_nav_menu_items($menuLocation);

  // Function to retrieve child items for a given menu item ID
  function getChildItems($menuItems, $parentItemId)
  {
    $childItems = array();

    foreach ($menuItems as $menuItem) {
      if ($menuItem->menu_item_parent == $parentItemId) {
        $childItems[] = $menuItem;
      }
    }

    return $childItems;
  }

  // Output the menu items with their respective child items
  if (!empty($menuItems)) {
    echo '<div class="main_menu_container">
    
    ';
    echo '<ul class="nav__links">';
    foreach ($menuItems as $menuItem) {
      $menuItemSlug = sanitize_title_with_dashes($menuItem->title);
      // Check if the current menu item has a parent
      if ($menuItem->menu_item_parent == 0) {
        // Check if the current menu item has children
        $hasChildren = false;
        foreach ($menuItems as $childItem) {
          if ($childItem->menu_item_parent == $menuItem->ID) {
            $hasChildren = true;
            break;
          }
        }

        if (!$hasChildren) {
          echo '<li class="nav--link"><a href="' . $menuItem->url . '">' . $menuItem->title . '</a></li><span class="material-symbols-outlined">
          expand_more </span>';
        } else {
          echo '<li class="nav--link" data-expand="' . $menuItemSlug . '"><a href="' . $menuItem->url . '">' . $menuItem->title . '</a></li><span class="material-symbols-outlined">
          expand_more</span>';
        }
      }
    }
    echo '</ul>';


    echo '<div class="tip"></div>
      <section class="header__expandMenu">
      <div class="menu__container">';
    foreach ($menuItems as $menuItem) {
      $menuItemSlug = sanitize_title_with_dashes($menuItem->title);
      // Check if the current menu item has a parent
      if ($menuItem->menu_item_parent == 0) {
        // Get the child items for the current menu item
        $childItems = getChildItems($menuItems, $menuItem->ID);
        // Check if the menu item has child items
        if (!empty($childItems)) {
          echo '<div id=' . $menuItemSlug . '>';
          echo '<div class="sub__menu">';
          echo '<ul class="subMenu__items">';
          foreach ($childItems as $childItem) {
            $item_img = wp_get_attachment_image(get_field('menu_img', $childItem->ID), 'full');
            $item_description = trim($childItem->post_content);
            if ($item_description) {
              echo '<li class="subMenu--item"><a href="' . $childItem->url . '">' . $item_img . '<div class="text_container"><p>' . pll__($childItem->title)  . '</p><span class="menu-description">' . $item_description . '</span></div></a></li>';
            } else {
              echo '<li class="subMenu--item"><a href="' . $childItem->url . '">' . $item_img . '<div class="text_container"><p>' . pll__($childItem->title)  . '</p></div></a></li>';
            }
          }
          echo '</ul></div><div class="spacer"></div></div>';
        }
      }
    }
    echo '</div>';
    echo '</section>';
    echo '</div>';

    echo '</div>';
  }
  ?>
