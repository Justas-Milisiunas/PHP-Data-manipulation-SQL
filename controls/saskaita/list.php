<?php

include 'services/saskaita.php';
$saskService = new saskaita();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $saskService->getAccountsCount();

// sukuriame puslapiavimo klasės objektą
include 'includes/paging.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio markes
$data = $saskService->getAccounts($paging->size, $paging->first);

include "templates/saskaita/list.php";

