<?php 

$db = require('Core/bootstrap.php');

$totalTax =array_flatten(
    $queryBuilder->select(['SUM(tax) as TotalTax'], 'sales_data_2')
    ->get());
     
$topSales = array_flatten(
    $queryBuilder->select(['cust_city, SUM(grand_total) as TopSales'], 'sales_data_2')
    ->where('cust_city', 'Toronto')
    ->get());


$total = array_flatten($queryBuilder->select(['ROUND(SUM(grand_total)) as total'], 'sales_data_2')
                                    ->get());



require 'index.view.php';
