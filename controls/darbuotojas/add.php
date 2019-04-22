<?php

if (!empty($_POST['submit'])) {
    include "includes/validator.php";
    include 'services/darbuotojas.php';
    $darbService = new darbuotojas();

    $arVisiGeri = true;
    for($i = 0; $i < count($_POST['asmens_kodas']); $i++)
    {
        if(empty($_POST['asmens_kodas'][$i]))
            continue;

        $validator = new validator();
        $asmErr = $validator->validate($_POST['asmens_kodas'][$i], "asmens_kodas");
        $vardErr = $validator->validate($_POST['vardas'][$i], "name", 20);
        $pavErr = $validator->validate($_POST['pavarde'][$i], "name", 20);
        $dirbErr = $validator->validate($_POST['dirba_nuo'][$i], "name", 20);
        $atlygErr = $validator->validate($_POST['atlyginimas'][$i], "float");
        $adresErr = $validator->validate($_POST['adresas'][$i], "name", 20);
        $telErr = $validator->validate($_POST['telefonas'][$i], "name", 20);
        $elektErr = $validator->validate($_POST['elektroninis_pastas'][$i], "email");
        $pareigErr = $validator->validate($_POST['pareigos'][$i], "name", 20);
        $pardtErr = $validator->validate($_POST['fk_PARDUOTUVEnr'], "name", 20);

//        var_dump($asmErr);
//        var_dump($vardErr);
//        var_dump($pavErr);
//        var_dump($dirbErr);
//        var_dump($atlygErr);
//        var_dump($adresErr);
//        var_dump($telErr);
//        var_dump($elektErr);
//        var_dump($pareigErr);
//        var_dump($pardtErr);

        if (!($asmErr && $vardErr && $pavErr && $dirbErr && $atlygErr && $adresErr && $telErr && $elektErr && $pareigErr && $pardtErr)) {
            $_GET['error'] = 1;
            $data = $_POST;
            $arVisiGeri = false;
            continue;
        }
    }

    if($arVisiGeri)
    {
        for($i = 0; $i < count($_POST['asmens_kodas']); $i++)
        {
            if(empty($_POST['asmens_kodas'][$i]))
                continue;

            $employee['asmens_kodas'] = $_POST['asmens_kodas'][$i];
            $employee['vardas'] = $_POST['vardas'][$i];
            $employee['pavarde'] = $_POST['pavarde'][$i];
            $employee['dirba_nuo'] = $_POST['dirba_nuo'][$i];
            $employee['atlyginimas'] = $_POST['atlyginimas'][$i];
            $employee['adresas'] = $_POST['adresas'][$i];
            $employee['telefonas'] = $_POST['telefonas'][$i];
            $employee['elektroninis_pastas'] = $_POST['elektroninis_pastas'][$i];
            $employee['pareigos'] = $_POST['pareigos'][$i];
            $employee['fk_PARDUOTUVEnr'] = $_POST['fk_PARDUOTUVEnr'];

            $result = $darbService->insertEmployee($employee);
            echo "RESULT";

            if(!$result) {
                $_GET['error'] = 2;
                $data = $_POST;
            }

        }
    }

    if(!isset($_GET['error']))
        header("Location: index.php?module={$module}&action=list");
}

include 'templates/darbuotojas/form.php';
