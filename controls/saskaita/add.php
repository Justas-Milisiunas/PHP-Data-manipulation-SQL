<?php

if (!empty($_POST['submit'])) {
    include 'includes/validator.php';
    include 'services/saskaita.php';
    include 'services/mokejimas.php';

    $validator = new validator();
    $saskService = new saskaita();
    $mokejService = new mokejimas();


    $sumaErr = $validator->validate($_POST['suma'], 'float');
    $darbErr = $validator->validate($_POST['fk_DARBUOTOJASasmens_kodas'], 'int');
    $klientoErr = $validator->validate($_POST['fk_KLIENTASasmens_kodas'], 'int');
    $currentDate = date('Y-m-d H:i:s');

    if($sumaErr && $klientoErr) {
        if (!empty($_POST['sumaMok'])) {
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
                $nextServiceID = $saskService->getNextID();

                $saskaita['data'] = $currentDate;
                $saskaita['suma'] = $_POST['suma'];
                $saskaita['fk_DARBUOTOJASasmens_kodas'] = $_POST['fk_DARBUOTOJASasmens_kodas'];
                $saskaita['fk_KLIENTASasmens_kodas'] = $_POST['fk_KLIENTASasmens_kodas'];
                $result = $saskService->insertAccount($saskaita);

                if(!$result) {
                    $_GET['error'] = 4;
                }

                foreach ($_POST['sumaMok'] as $item) {
                    if(empty($item))
                        continue;

                    $mokejimas['data'] = $currentDate;
                    $mokejimas['suma'] = $item;
                    $mokejimas['fk_SASKAITAnr'] = $nextServiceID;
                    $mokejimas['fk_KLIENTASasmens_kodas'] = $_POST['fk_KLIENTASasmens_kodas'];

                    $result = $mokejService->insertPayment($mokejimas);
                    if(!$result) {
                        $_GET['error'] = 3;
                    }
                }
            }
        }

        if(!isset($_GET['error']))
            header("Location: index.php?module={$module}&action=list");
        else
            $data = $_POST;
    } else {
        $data = $_POST;
        $_GET['error'] = 1;
    }

}

include 'templates/saskaita/form.php';
