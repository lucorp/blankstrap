<?php

function template_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('custom-header');
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'template_setup');


add_action('admin_menu', 'add_global_custom_options');

function add_global_custom_options() {
    add_options_page('Globálne nastavenia', 'Globálne nastavenia', 'manage_options', 'functions','global_custom_options');
}

function global_custom_options() {
?>

    <h2>Globálne nastavenia</h2>
    <form method="post" action="options.php">
    <?php wp_nonce_field('update-options') ?>

        <table>

            <tr>
                <td><label>URL pre Facebook: </label></td>
                <td><input type="text" name="facebookurl" size="100" value="<?php echo get_option('facebookurl'); ?>" /></td>
            </tr>

            <tr>
                <td><label>URL pre Instagram: </label></td>
                <td><input type="text" name="instagramurl" size="100" value="<?php echo get_option('instagramurl'); ?>" /></td>
            </tr>

            <tr>
                <td><label>Ulica: </label></td>
                <td><input type="text" name="companystreet" size="100" value="<?php echo get_option('companystreet'); ?>" /></td>
            </tr>

            <tr>
                <td><label>Mesto: </label></td>
                <td><input type="text" name="companycity" size="100" value="<?php echo get_option('companycity'); ?>" /></td>
            </tr>

            <tr>
                <td><label>PSČ: </label></td>
                <td><input type="text" name="companyzip" size="100" value="<?php echo get_option('companyzip'); ?>" /></td>
            </tr>

            <tr>
                <td><label>Email: </label></td>
                <td><input type="text" name="companyemail" size="100" value="<?php echo get_option('companyemail'); ?>" /></td>
            </tr>

            <tr>
                <td><label>Phone: </label></td>
                <td><input type="text" name="companyphone" size="100" value="<?php echo get_option('companyphone'); ?>" /></td>
            </tr>


            <tr><td colspan="2"><input type="submit" name="Submit" value="Uložiť" /></td></tr>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="facebookurl,instagramurl,companystreet,companycity,companyemail,companyphone,companyzip" />
        </table>
    </form>


    <?php
}



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
