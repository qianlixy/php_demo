<?php

include "../databaseManager.php";

$currentPage = 2;
$pageSize = 10;
if(array_key_exists("currentPage", $_GET)) $currentPage = $_GET['currentPage'];
if(array_key_exists("pageSize", $_GET)) $pageSize = $_GET['pageSize'];
if(array_key_exists("currentPage", $_POST)) $currentPage = $_POST['currentPage'];
if(array_key_exists("pageSize", $_POST)) $pageSize = $_POST['pageSize'];

$page = array("currentPage"=>$currentPage,"pageSize"=>$pageSize);
$page = selectPage("student", $page);
echo "{\"currentPage\":".$page['currentPage'].",\"pageSize\":".$page['pageSize'].",\"totalPage\":".$page['totalPage'].",\"totalSize\":".$page['totalSize'].",\"data\":".$page['data']."}";

 ?>
