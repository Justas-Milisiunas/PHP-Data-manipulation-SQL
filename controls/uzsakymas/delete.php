<?php

include 'services/uzsakymas.php';
include  'services/zaisloUzsakymas.php';

$uzsakService = new uzsakymas();
$zaisloUzsakService = new zaisloUzsakymas();

if (!empty($id)) {

    $error = '';
    if (!$zaisloUzsakService->deleteOrdersWhereID($id) || !$uzsakService->deleteOrder($id)) {
        $error = '&error=2';
    }

    header("Location: index.php?module={$module}&action=list{$error}");
}
