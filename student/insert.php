<?php
include "../databaseManager.php";
try {
    insert("student", $_POST);
    echo "{\"success\":true}";
} catch(Exception $e) {
    echo "{\"success\":false,\"errorMessage\":\"$e\"}";
}

?>
