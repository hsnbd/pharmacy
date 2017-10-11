<?php
function PriceCal($price, $vat, $discount){
    $price = $price - ($price*$discount)/100;
    $price = round($price + ($price*$vat)/100);
    return $price;
}
