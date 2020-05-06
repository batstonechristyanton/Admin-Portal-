<?php
function dd($array){
    echo '<pre>';
    die(var_dump($array));
    echo '</pre>';
  }

  function array_flatten($array) { 
    if (!is_array($array)) { 
      return false; 
    } 
    $result = array(); 
    foreach ($array as $key => $value) { 
      if (is_array($value)) { 
        $result = array_merge($result, array_flatten($value)); 
      } else { 
        $result = array_merge($result, array($key => $value));
      } 
    } 
    return $result; 
  }

  function prepData($results)
  {

    $data = [];

    $data['purchase_date'] = array_map(function($result){
      $date = new DateTime($result['purchase_date']);
      return $date->format('Y-m-d');
    }, $results);

    $data['tax'] = array_map(function($result){
        return $result['tax'];
    }, $results);

    $data['grand_total'] = array_map(function($result){
        return $result['grand_total'];
    }, $results);

    $data['shipping'] = array_map(function($result){
        return $result['shipping'];
    }, $results);


    return $data;
  }