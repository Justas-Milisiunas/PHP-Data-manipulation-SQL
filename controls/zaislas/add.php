<?php

if (!empty($_POST['submit'])) {
    include "includes/validator.php";
    $validator = new validator();
    $nameErr = $validator->validate($_POST['pavadinimas'], "name", 20);
    $weightErr = $validator->validate($_POST['svoris'], "float");
    $valueErr = $validator->validate($_POST['verte'], "float");

    if ($nameErr && $weightErr && $valueErr) {
        $zaislas = $_POST;

        include 'services/zaislas.php';
        $zaislasService = new zaislas();
        $zaislasService->insertToy($zaislas);

        header("Location: index.php?module=zaislas&action=list");
    } else {
        $data = $_POST;
        $_GET['error'] = 1;
    }
}

include 'templates/zaislas/form.php';
