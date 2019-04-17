<?php

include 'services/uzsakymas.php';
$uzsakService = new uzsakymas();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $uzsakService->getOrdersCount();

// sukuriame puslapiavimo klasės objektą
include 'includes/paging.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio markes
$data = $uzsakService->getOrders($paging->size, $paging->first);

include "templates/uzsakymas/list.php";

