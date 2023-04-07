<?php

function addItem() {
    $menuItems = $_SESSION['menuitems'];
    $barcode = $_SESSION['field'][0];
    $menuItemsLength = count($menuItems);
    $barcode = (int)$barcode;

    for($i = 0; $i < $menuItemsLength; $i++){
        if($barcode === $menuItems[$i]->barcode){
             array_push($_SESSION['order'],$menuItems[$i]);
             
             $_SESSION['orderTotal'] = $_SESSION['orderTotal'] + $menuItems[$i]->price;
        }
    }
    
    // print_r($_SESSION['order']);
    return;
}