<?php

include 'services/darbuotojas.php';
$darbuotojasService = new darbuotojas();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $darbuotojasService->getEmployeesCount();

// sukuriame puslapiavimo klasės objektą
include 'includes/paging.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio markes
$data = $darbuotojasService->getEmployees($paging->size, $paging->first);

include "templates/darbuotojas/list.php";

