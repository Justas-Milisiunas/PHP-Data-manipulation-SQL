<?php

include 'services/darbuotojas.php';
$darbService = new darbuotojas();

if (!empty($id)) {

    $error = '';
    if (!$darbService->deleteEmployee($id)) {
        $error = '&error=2';
    }

    header("Location: index.php?module={$module}&action=list{$error}");
}
