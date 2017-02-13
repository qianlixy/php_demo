<?php
    include "configManager.php";
    include "dbResultToJson.php";

    function getDbProperty() {
        return "../database.properties";
    }

    function getConnection() {
        $host = getConfig(getDbProperty(), "host");
        $user = getConfig(getDbProperty(), "user");
        $pass = getConfig(getDbProperty(), "password");
        $db = getConfig(getDbProperty(), "database");
        $con = mysqli_connect($host, $user, $pass, $db);
        $con->set_charset("utf8");
        return $con;
    }

    function selectAll($table) {
        $link = getConnection();
        $result = mysqli_query($link, "SELECT * FROM $table;");
        return arrayToJson($result);
        mysqli_close($link);
    }

    function selectOne($table, $id) {
        $link = getConnection();
        $result = mysqli_query($link, "SELECT * FROM $table WHERE ID = $id;");
        return objectToJson($result);
        mysqli_close($link);
    }

    function insert($table) {

    }

?>
