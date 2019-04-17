<?php

include 'services/zaislas.php';
$zaislas = new zaislas();

if (!empty($id)) {

    $error = '';
    if (!$zaislas->delete($id)) {
      $error = '&error=2';
    }

    header("Location: index.php?module={$module}&action=list{$error}");
}
