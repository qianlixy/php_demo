<?php
include "../databaseManager.php";
if(!array_key_exists('id', $_GET) && !array_key_exists("ids", $_GET)) {
    echo "{\"success\":false,\"errorMsg\":\"参数id或ids不能为空\"}";
} else {
    $ids = array();
    if(array_key_exists('id', $_GET)) {
        array_push($ids, $_GET['id']);
    }
    if(array_key_exists("ids", $_GET)) {
        foreach(explode(",", $_GET['ids']) as $id) {
            array_push($ids, $id);
        }
    }
    try {
        delete("student", $ids);
        echo "{\"success\":true}";
    } catch (Exception $e) {
        echo "{\"success\":false,\"errorMsg\":\"$e\"}";
    }
}

?>
