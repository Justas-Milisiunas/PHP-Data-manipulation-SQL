<?php
include 'services/saskaita.php';
include 'services/mokejimas.php';
$saskService = new saskaita();
$mokService = new mokejimas();

$data = '';
if (!empty($_POST['submit'])) {
    include "includes/validator.php";
    $validator = new validator();

    $sumaErr = $validator->validate($_POST['suma'], 'float');
    $darbErr = $validator->validate($_POST['fk_DARBUOTOJASasmens_kodas'], 'int');
    $klientoErr = $validator->validate($_POST['fk_KLIENTASasmens_kodas'], 'int');

    if ($sumaErr && $darbErr && $klientoErr) {
        $arVisiGeri = true;
        foreach ($_POST['sumaMok'] as $item) {
            if(empty($item))
                continue;

            $mokSumErr = $validator->validate($item, 'float');

            if(!$mokSumErr) {
                $arVisiGeri = false;
                break;
            }
        }

        if(!$arVisiGeri) {
            $data = $_POST;
            $_GET['error'] = 2;
        } else {
            $nextServiceID = $id;
            $currentDate = date('Y-m-d H:i:s');

            $saskaita['nr'] = $id;
            $saskaita['suma'] = $_POST['suma'];
            $saskaita['fk_DARBUOTOJASasmens_kodas'] = $_POST['fk_DARBUOTOJASasmens_kodas'];
            $saskaita['fk_KLIENTASasmens_kodas'] = $_POST['fk_KLIENTASasmens_kodas'];
            $result = $saskService->updateAccount($saskaita);

            if(!$result) {
                $_GET['error'] = 4;
            }

            $mokService->deleteWhereAccountIs($id);

            foreach ($_POST['sumaMok'] as $key=>$item) {
                if(empty($item))
                    continue;

                $mokejimas['data'] = isset($data['sumaMok'][$key]) ? $data['sumaMok'][$key] : $currentDate;
                $mokejimas['suma'] = $item;
                $mokejimas['fk_SASKAITAnr'] = $nextServiceID;
                $mokejimas['fk_KLIENTASasmens_kodas'] = $_POST['fk_KLIENTASasmens_kodas'];

                var_dump($mokejimas);
                $result = $mokService->insertPayment($mokejimas);
                var_dump($result);
                if(!$result) {
                    $_GET['error'] = 3;
                }
            }

            if(!isset($_GET['error']))
                header("Location: index.php?module={$module}&action=list");
        }
    } else {
        var_dump($_POST);
        $data = $_POST;
        $_GET['error'] = 1;
    }
} else {
    $data = $saskService->getAccount($id);
//    var_dump($data);
//    die();
    $result = $mokService->getPaymentsWhereAccountIs($id);

    $visiMok = array();
    foreach ($result as $key=>$row) {
        $visiMok[$key] = $row['suma'];
    }

    $data['sumaMok'] = $visiMok;
}

include 'templates/saskaita/form.php';
