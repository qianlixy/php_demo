<?php
    include "configManager.php";
    include "dbResultToJson.php";

    function getDbProperty() {
        return "../database.properties";
    }

    function getTableFields($result) {
        $arr = $result->fetch_fields();
        $fieldsArr = array();
        for($i=0;$i<count($arr);$i++) {
            $fieldsArr[$i]=$arr[$i];
        }
        return $fieldsArr;
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

    function insert($table, $student) {
        $link = getConnection();
        $result = mysqli_query($link, "SELECT * FROM $table LIMIT 0;");
        $fields = getTableFields($result);
        $sql = "INSERT INTO $table VALUES(";
        foreach ($fields as $field) {
            $fieldName = $field->name;
            $value = "";
            if(!array_key_exists($fieldName, $student)) {
                $value = "NULL";
            } else {
                $value = "'".$student[$fieldName]."'";
            }
            $sql = $sql.$value.",";
        }
        $sql = substr($sql, 0, strlen($sql)-1).");";
        mysqli_query($link, $sql);
        mysqli_close($link);
    }

    function update($table, $student) {
        if(!array_key_exists("id", $student)) throw new Exception("id不能為空");
        $link = getConnection();
        $sql = "UPDATE $table SET ";
        foreach ($student as $key => $value) {
            $sql = $sql.$key."='".$value."', ";
        }
        $sql = substr($sql, 0, strlen($sql)-2);
        $sql = $sql." WHERE id = ".$student['id'];
        mysqli_query($link, $sql);
        mysqli_close($link);
    }

    function delete($table, $ids) {
        if(count($ids) <= 0) throw new Exception("ids不能為空");
        $link = getConnection();
        $sql = "DELETE FROM $table WHERE ID IN (";
        foreach ($ids as $id) {
            $sql = $sql."'".$id."', ";
        }
        $sql = substr($sql, 0, strlen($sql)-2).");";
        mysqli_query($link, $sql);
        mysqli_close($link);
    }

?>
