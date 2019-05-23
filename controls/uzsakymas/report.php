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
    $statusErr = $validator->validate($_POST['status'], "positivenumber");

    if ($sinceDateErr && $untilDateErr && $toysCountFromErr && $toysCountUntilErr && $statusErr) {
        $data = $uzsakymuService->getForReport($_POST['nuo'], $_POST['iki'], $_POST['kiekis_nuo'], $_POST['kiekis_iki'], $_POST['status']);

        $limits = [$_POST['nuo'], $_POST['iki'], $_POST['kiekis_nuo'], $_POST['kiekis_iki'], $_POST['status']];
    } else {
        $_GET['error'] = 1;
    }
}

include 'templates/uzsakymas/report.php';
