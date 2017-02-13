<?php
    include "../databaseManager.php";
    if(count($_GET) <= 0) {
        echo "缺少參數id";
    } else {
        echo selectOne("student", $_GET['id']);
    }
?>
