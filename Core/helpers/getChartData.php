<?php
require '../bootstrap.php';
$results = $queryBuilder->select(['purchase_date', 'tax', 'grand_total', 'shipping'], 'sales_data_2')->orderBy('purchase_date', $_GET['sortBy'])->get();   
echo json_encode(prepData($results));


