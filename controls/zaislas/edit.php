<?php
include 'services/zaislas.php';
$zaislasService = new zaislas();

$data = '';
if (!empty($_POST['submit'])) {
    include "includes/validator.php";
    $validator = new validator();
    $nameErr = $validator->validate($_POST['pavadinimas'], "name", 20);
    $weightErr = $validator->validate($_POST['svoris'], "float");
    $valueErr = $validator->validate($_POST['verte'], "float");

//    var_dump($nameErr);
//    var_dump($weightErr);
//    var_dump($valueErr);

    if ($nameErr && $weightErr && $valueErr) {
        $zaislas = $_POST;
        $zaislas['id'] = $id;

        $result = $zaislasService->updateToy($zaislas);

//        var_dump($result);
//        die();

        if(!$result) {
            header("Location: index.php?module={$module}&action=edit&error=1");
        }

        header("Location: index.php?module={$module}&action=list");
    } else {
        $data = $_POST;
        $_GET['error'] = 1;
    }
} else {
    $data = $zaislasService->getToy($id)[0];
}

include 'templates/zaislas/form.php';
