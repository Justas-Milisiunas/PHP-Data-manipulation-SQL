<?php

include 'services/parduotuve.php';
$parduotuve = new parduotuve();

if (!empty($id)) {

    $error = '';
    if (!$parduotuve->deleteShop($id)) {
        $error = '&error=2';
    }

    header("Location: index.php?module={$module}&action=list{$error}");
}
