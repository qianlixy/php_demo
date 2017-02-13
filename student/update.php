<?php
include "../databaseManager.php";
try {
    update("student", $_POST);
    echo "{\"success\":true}";
} catch(Exception $e) {
    echo "{\"success\":false,\"errorMessage\":\"$e\"}";
}
?>
