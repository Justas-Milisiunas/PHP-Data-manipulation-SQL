<?php

include 'services/miestas.php';
$miestas = new miestas();

if (!empty($id)) {

    $count = $miestas->getShopCountOfCity($id);
    var_dump($count);

    $error = '';
    if ($count == 0) {
        $miestas->deleteCity($id);
    } else {
        //Kazkas naudoja ta miesta
        $error = '&error=2';
    }

    header("Location: index.php?module={$module}&action=list{$error}");
}
