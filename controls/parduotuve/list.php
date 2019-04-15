<?php

include 'services/parduotuve.php';
$parduotuve = new parduotuve();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $parduotuve->getShopsCount();

// sukuriame puslapiavimo klasės objektą
include 'includes/paging.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio markes
$data = $parduotuve->getShops($paging->size, $paging->first);

include "templates/parduotuve/list.php";

