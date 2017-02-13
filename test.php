<?php
include 'configManager.php';
echo "'".getConfig("database.properties", "host")."'";
echo "<br/>";
echo "'".getConfig("database.properties", "user")."'";
echo "<br/>";
echo "'".getConfig("database.properties", "password")."'";
?>
