<?php
include 'services/zaislas.php';
$zaislasService = new zaislas();

$data = '';
if (!empty($_POST['submit'])) {
    include "includes/validator.php";
    $validator = new validator();
    $nameErr = $validator->validate($_POST['pavadinimas'][0], "name", 20);
    $weightErr = $validator->validate($_POST['svoris'][0], "float");
    $valueErr = $validator->validate($_POST['verte'][0], "float");

//    var_dump($nameErr);
//    var_dump($weightErr);
//    var_dump($valueErr);

    if ($nameErr && $weightErr && $valueErr) {
        $zaislas['id'] = $id;
        $zaislas['pavadinimas'] = $_POST['pavadinimas'][0];
        $zaislas['svoris'] = $_POST['svoris'][0];
        $zaislas['verte'] = $_POST['verte'][0];

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
