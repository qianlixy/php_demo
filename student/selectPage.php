<?php

include "../databaseManager.php";

$currentPage = 1;
$pageSize = 10;
if(array_key_exists("currentPage", $_POST)) $currentPage = $_POST['currentPage'];
if(array_key_exists("pageSize", $_POST)) $pageSize = $_POST['pageSize'];

$page = array("currentPage"=>$currentPage,"pageSize"=>$pageSize);
selectPage("student", $page);

 ?>
