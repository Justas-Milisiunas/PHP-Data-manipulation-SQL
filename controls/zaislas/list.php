<?php

include 'services/zaislas.php';
$zaislas = new zaislas();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $zaislas->getToysCount();

// sukuriame puslapiavimo klasės objektą
include 'includes/paging.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio markes
$data = $zaislas->GetToys($paging->size, $paging->first);

include "templates/zaislas/list.php";

