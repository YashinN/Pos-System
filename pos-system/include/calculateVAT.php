<?php



function calculateVAT($PurchasedItemsTotal) {

    $vat = 0.15 * $PurchasedItemsTotal;

    return $vat;
}