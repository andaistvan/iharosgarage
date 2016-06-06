<?php

class F6_VERTICAL_MENU_WALKER extends Walker_Nav_Menu
{
    /*
     * Add vertical menu class and submenu data attribute to sub menus
     */

    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"vertical dropdown menu\" data-dropdown-menu>\n";
    }
}

//Optional fallback
function f6_VERTICAL_menu_fallback($args)
{
    /*
     * Instantiate new Page Walker class instead of applying a filter to the
     * "wp_page_menu" function in the event there are multiple active menus in theme.
     */

    $walker_page = new Walker_Page();
    $fallback = $walker_page->walk(get_pages(), 0);
    $fallback = str_replace("<ul class='children'>", '<ul class="children submenu menu vertical" data-dropdown-menu>', $fallback);

    echo '<ul class="vertical dropdown menu" data-dropdown-menu">'.$fallback.'</ul>';
}
