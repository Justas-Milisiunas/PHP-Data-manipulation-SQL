<?php
include 'services/darbuotojas.php';
$darbService = new darbuotojas();

$data = '';
if (!empty($_POST['submit'])) {
    include "includes/validator.php";
    $validator = new validator();

//    var_dump($_POST['fk_PARDUOTUVEnr']);
//    die();

    $asmErr = $validator->validate($_POST['asmens_kodas'][0], "asmens_kodas");
    $vardErr = $validator->validate($_POST['vardas'][0], "name", 20);
    $pavErr = $validator->validate($_POST['pavarde'][0], "name", 20);
    $dirbErr = $validator->validate($_POST['dirba_nuo'][0], "name", 20);
    $atlygErr = $validator->validate($_POST['atlyginimas'][0], "float");
    $adresErr = $validator->validate($_POST['adresas'][0], "name", 20);
    $telErr = $validator->validate($_POST['telefonas'][0], "name", 20);
    $elektErr = $validator->validate($_POST['elektroninis_pastas'][0], "email");
    $pareigErr = $validator->validate($_POST['pareigos'][0], "name", 20);
    $pardtErr = $validator->validate($_POST['fk_PARDUOTUVEnr'], "name", 20);

//    var_dump($asmErr);
//    var_dump($vardErr);
//    var_dump($pavErr);
//    var_dump($dirbErr);
//    var_dump($atlygErr);
//    var_dump($adresErr);
//    var_dump($telErr);
//    var_dump($elektErr);
//    var_dump($pareigErr);
//    var_dump($pardtErr);

//    die();
    if (($asmErr && $vardErr && $pavErr && $dirbErr && $atlygErr && $adresErr && $telErr && $elektErr && $pareigErr && $pardtErr)) {
        $darbuotojas = $_POST;
        $result = $darbService->updateEmployee($darbuotojas);
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
    $data = $darbService->getEmployee($id)[0];
//    var_dump($data);
}

include 'templates/darbuotojas/form.php';
