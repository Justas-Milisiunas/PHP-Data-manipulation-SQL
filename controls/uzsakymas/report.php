<?php
include "includes/validator.php";
include "services/uzsakymas.php";

$uzsakymuService = new uzsakymas();
$data = '';
$limits = '';

if (!empty($_POST['submit'])) {
    $validator = new validator();

    $sinceDateErr = $validator->validate($_POST['nuo'], "date", 20);
    $untilDateErr = $validator->validate($_POST['iki'], "date", 20);
    $toysCountFromErr = $validator->validate($_POST['kiekis_nuo'], "positivenumber");
    $toysCountUntilErr = $validator->validate($_POST['kiekis_iki'], "positivenumber");

    if ($sinceDateErr && $untilDateErr && $toysCountFromErr && $toysCountUntilErr) {
        $data = $uzsakymuService->selectForReport($_POST['nuo'], $_POST['iki'], $_POST['kiekis_nuo'], $_POST['kiekis_iki']);
        $limits = [$_POST['nuo'], $_POST['iki'], $_POST['kiekis_nuo'], $_POST['kiekis_iki']];
    } else {
        $_GET['error'] = 1;
    }
}

include 'templates/uzsakymas/report.php';
