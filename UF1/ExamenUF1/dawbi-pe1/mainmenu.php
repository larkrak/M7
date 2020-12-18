<?php

/*
 * echoes a main menu for this application.
 */

/**
 * renders menu.
 * @return string
 */
function renderMenu(): string {
    $menu =  [
        ["home", "index.php"],
        ["list products", "listproducts.php"],
        ["add product", "addproduct.php"],
        ["login", "login.php"],
        ["logout", "logout.php"]
    ];
    $htmlMenu = "";
    $htmlMenu .= sprintf("<ul>\n");
    foreach ($menu as $value) {
        $htmlMenu .= sprintf("<li><a href='%s'>%s</a></li>\n", $value[1], ucwords($value[0]));
    }
    $htmlMenu .= sprintf("</ul>\n");
    $htmlMenu .= sprintf("</div>\n");
    return $htmlMenu;
}

echo renderMenu();