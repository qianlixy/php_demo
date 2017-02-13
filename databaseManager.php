<?php
    include "configManager.php";
    include "dbResultToJson.php";

    function getDbProperty() {
        return "../database.properties";
    }

    function getConnection($dbName) {
        $host = getConfig(getDbProperty(), "host");
        $user = getConfig(getDbProperty(), "user");
        $pass = getConfig(getDbProperty(), "password");
        $con = mysqli_connect($host, $user, $pass, $dbName);
        $con->set_charset("utf8");
        return $con;
    }

    function selectAll($dbName, $table) {
        $link = getConnection($dbName);
        $result = mysqli_query($link, "SELECT * FROM $table");
        return toJson($result);
        mysqli_close($link);
    }

?>
