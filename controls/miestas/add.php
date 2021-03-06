<?php

if (!empty($_POST['submit'])) {
    include "includes/validator.php";
    $validator = new validator();
    $nameErr = $validator->validate($_POST['pavadinimas'], "name", 20);

    if ($nameErr) {
        $city = $_POST;
        $city['pavadinimas'] = mysql::escape($city['pavadinimas']);
        include 'services/miestas.php';

        $result = miestas::insertCity($city);
        header("Location: index.php?module=miestas&action=list");
    } else {
        $data = $_POST;
        $_GET['error'] = 1;
    }
}

include 'templates/miestas/form.php';
