<?php

if (!empty($_POST['submit'])) {
    include "includes/validator.php";
    include 'services/zaislas.php';
    $zaislasService = new zaislas();

    for($i = 0; $i < count($_POST['pavadinimas']); $i++)
    {
        if($i == 1)
            continue;

        $validator = new validator();
        $nameErr = $validator->validate($_POST['pavadinimas'][$i], "name", 20);
        $weightErr = $validator->validate($_POST['svoris'][$i], "float");
        $valueErr = $validator->validate($_POST['verte'][$i], "float");



        if (!($nameErr && $weightErr)) {
            $_GET['error'] = 1;
            break;
        }

        $toy['pavadinimas'] = $_POST['pavadinimas'][$i];
        $toy['svoris'] = $_POST['svoris'][$i];
        $toy['verte'] = $_POST['verte'][$i];

        $zaislasService->insertToy($toy);
    }

    if(!isset($_GET['error']))
        header("Location: index.php?module=zaislas&action=list");
}

include 'templates/zaislas/form.php';
