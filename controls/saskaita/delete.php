<?php

include 'services/saskaita.php';
include 'services/mokejimas.php';
$saskService = new saskaita();
$mokService = new mokejimas();

if (!empty($id)) {

    $error = '';
    if (!$mokService->deleteWhereAccountIs($id) || !$saskService->deleteAccount($id)) {
        $error = '&error=2';
    }

    header("Location: index.php?module={$module}&action=list{$error}");
}
