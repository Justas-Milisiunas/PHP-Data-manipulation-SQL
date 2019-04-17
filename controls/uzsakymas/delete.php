<?php

include 'services/uzsakymas.php';
$uzsakService = new uzsakymas();

if (!empty($id)) {

    $error = '';
    if (!$uzsakService->deleteOrder($id)) {
        $error = '&error=2';
    }

    header("Location: index.php?module={$module}&action=list{$error}");
}
