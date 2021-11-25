<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function sum_harga($tarif){
    $total = 0;
    for($i = 0; $i < count($tarif); $i++){
        $total = $total + $tarif[$i];
    }
    return $total;
}

function curformat($value, $dec=0){
    $res = number_format ($value,$dec,",",".");
    return $res;
}

function delete_curformat($value, $dec=0){
    $res = number_format ($value,$dec,",","");
    return $res;
}