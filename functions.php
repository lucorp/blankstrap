<?php

function print_hp_menu($menu_name) {

    $menuitems = wp_get_nav_menu_items($menu_name);

    if ($menuitems == false) {
        exit();
    }
    echo '<nav class="navbar sticky-top navbar-expand-lg">';
    echo '<div class="collapse navbar-collapse justify-content-between" id="navbar1">';
    echo '<ul class="navbar-nav">';
    $current_url = home_url( $wp->request ) . $_SERVER['REQUEST_URI'];
    $sorted_menu = array();
    foreach ($menuitems as $menu) {
        if ($menu->menu_item_parent == 0) {
            $sorted_menu[$menu->ID] = array('title' => $menu->title,
                'url' => $menu->url);
        }
    }
    foreach ($menuitems as $menu) {
        if (array_key_exists($menu->menu_item_parent, $sorted_menu)) {
            $sorted_menu[$menu->menu_item_parent]['children'][] = array('title' => $menu->title,
                'url' => $menu->url);
        }
    }
    foreach ($sorted_menu as $menuitem) {
        if (array_key_exists('children', $menuitem)) {
            echo '<li class="dropdown';
            if ($menuitem['url'] == $current_url) {
                echo ' active';
            }
            if ($current_url == home_url( $wp->request ) . '/' && $menuitem['url'] == '/') {
                echo ' active';
            }
            echo '">';
            echo '<a data-toggle="dropdown" data-submenu="" aria-expanded="false">' . $menuitem['title'] . '</a>';
            echo '<ul class="dropdown-menu">';
            foreach ($menuitem['children'] as $child) {
                echo '<li class="submenu-item';
                if ($child['url'] == $current_url) {
                    echo ' active';
                }
                echo '">';
                echo '<a class="nav-link" href="' . $child['url'] . '">' . $child['title'] . '</a>';
                echo '</li>';
            }
            echo '</ul>';
            echo '</li>';
        } else {
            echo '<li class="nav-item';
            if ($menuitem['url'] == $current_url) {
                echo ' active';
            }
            if ($current_url == home_url( $wp->request ) . '/' && $menuitem['url'] == '/') {
                echo ' active';
            }
            echo '">';
            echo '<a class="nav-link" href="' . $menuitem['url'] . '">' . $menuitem['title'] . '</a>';
            echo '</li>';
        }
    }
    echo '</ul>';
    echo '<div class="search-form hidden-xs hidden-sm hidden-md">';
    get_search_form(true);
    echo '</div>';
    echo '</div>';
    echo '<button class="navbar-toggler navbar-toggler-right hidden-lg hidden-md hidden-sm" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">';
    echo '<i class="fa fa-bars" aria-hidden="true"></i>';
    echo '</button>';
    echo '</nav>';

}
