<?php
define('SORT_BY', 'DESC');
$config = require 'config/config.php';
require 'helpers/function.php';
require 'database/Connection.php';
require 'database/QueryBuilder.php';

$queryBuilder = new QueryBuilder(Connection::connect($config));