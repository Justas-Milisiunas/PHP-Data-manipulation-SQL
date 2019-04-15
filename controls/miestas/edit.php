<?php

include 'services/miestas.php';
$miestas = new miestas();

$data = '';

if (!empty($_POST['submit'])) {
    include "includes/validator.php";
    $validator = new validator();
    $nameErr = $validator->validate($_POST['pavadinimas'], "name", 20);
    $weightErr = $validator->validate($_POST['svoris'], "float");
    $valueErr = $validator->validate($_POST['verte'], "float");

    if ($nameErr && $weightErr && $valueErr) {
        $city = $_POST;
        $city['pavadinimas'] = mysql::escape($city['pavadinimas']);

        $city['id_MIESTAS'] = mysql::escape($id);
        $result = $miestas->updateCity($city);
        die();
        header("Location: index.php?module=miestas&action=list");
    } else {
        $data['pavadinimas'] = $_POST['pavadinimas'];
        $data['svoris'] = $_POST['svoris'];
        $data['verte'] = $_POST['verte'];
        $data = array_diff( $data, array( '""' ) );
        $_GET['error'] = 1;
    }
} else {
    $data = $miestas->getCity($id)[0];
}

include 'templates/miestas/form.php';
