<?php

include 'services/miestas.php';
$miestas = new miestas();
$data = $miestas->getCities();


// suskaičiuojame bendrą įrašų kiekį
$elementCount = $miestas->getCitiesCount();

// sukuriame puslapiavimo klasės objektą
include 'includes/paging.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio markes
$data = $miestas->getCities($paging->size, $paging->first);

include "templates/miestas/list.php";

