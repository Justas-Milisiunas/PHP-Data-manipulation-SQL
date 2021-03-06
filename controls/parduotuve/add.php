<?php
include 'services/parduotuve.php';
$parduotuvesService = new parduotuve();

if (!empty($_POST['submit'])) {
    include "includes/validator.php";
    $validator = new validator();
    $nameErr = $validator->validate($_POST['pavadinimas'], "name", 20);
    $adrErr = $validator->validate($_POST['adresas'], "name", 30);
    $telErr = $validator->validate($_POST['telefonas'], "name", 20);
    $epastErr = $validator->validate($_POST['e_pastas'], "email", 20);
    $dirbNuoErr = $validator->validate($_POST['dirba_nuo'], "name", 20);
    $pastErr = $validator->validate($_POST['pasto_kodas'], "int");
    $dbskErr = $validator->validate($_POST['darbuotoju_skaicius'], "int");
    $cityErr = $validator->validate($_POST['fk_MIESTASid_MIESTAS'], "name", 20);

    if ($nameErr && $adrErr && $telErr && $epastErr && $dirbNuoErr && $dbskErr && $pastErr & $cityErr) {
        $shop = $_POST;
        $shop['pavadinimas'] = mysql::escape($shop['pavadinimas']);
        $shop['adresas'] = mysql::escape($shop['adresas']);
        $shop['telefonas'] = mysql::escape($shop['telefonas']);
        $shop['e_pastas'] = mysql::escape($shop['e_pastas']);
        $shop['dirba_nuo'] = mysql::escape($shop['dirba_nuo']);
        $shop['pasto_kodas'] = mysql::escape($shop['pasto_kodas']);
        $shop['darbuotoju_skaicius'] = mysql::escape($shop['darbuotoju_skaicius']);
        $shop['fk_MIESTASid_MIESTAS'] = mysql::escape($shop['fk_MIESTASid_MIESTAS']);

        $result = $parduotuvesService->insertShop($shop);
        header("Location: index.php?module={$module}&action=list");
    } else {
        $data = $_POST;
        $_GET['error'] = 1;
    }
}

include 'templates/parduotuve/form.php';
