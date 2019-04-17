<?php

include 'services/miestas.php';
$miestas = new miestas();

$data = '';

if (!empty($_POST['submit'])) {
    include "includes/validator.php";
    $validator = new validator();
    $nameErr = $validator->validate($_POST['pavadinimas'], "name", 20);

    if ($nameErr) {
        $city = $_POST;
        $city['pavadinimas'] = mysql::escape($city['pavadinimas']);

        $city['id_MIESTAS'] = mysql::escape($id);
        $result = $miestas->updateCity($city);

        header("Location: index.php?module=miestas&action=list");
    } else {
        $data = $_POST;
        $_GET['error'] = 1;
    }
} else {
    $data = $miestas->getCity($id)[0];
}

include 'templates/miestas/form.php';
