<?php
require_once 'jqgrid/jq-config.php';
// include the jqGrid Class
require_once "jqgrid/php/jqGrid.php";
// include the PDO driver class
require_once "jqgrid/php/jqGridPdo.php";
// Connection to the server
$conn = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
// Tell the db that we use utf-8
$conn->query("SET NAMES utf8");

// Create the jqGrid instance
$grid = new jqGridRender($conn);
// Write the SQL Query
$grid->SelectCommand = "SELECT firstname, surname, DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(dob)), '%Y')+0 AS age FROM person";
// set the ouput format to json
$grid->dataType = 'json';
// Let the grid create the model
$grid->setColModel();
// Set the url from where we obtain the data
$grid->setUrl('/grid-init.php');
// Set grid caption using the option caption
$grid->setGridOptions(array(
    "rowNum"=>10,
    //"sortname"=>"OrderID",
    "hoverrows"=>true,
    "rowList"=>array(10,20,50),
    ));

// Enjoy
$grid->renderGrid('#grid','#pager',true, null, null, true,true);
$conn = null;
?>
