<?php

    function getColumnWrap($field) {
        $type = $field->type;
        switch ($type) {
            case 0:
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
            case 8:
            case 9:
                return "";
            default:
                return "\"";
        }
    }

    function doColumn($field, $value) {
        $wrap = getColumnWrap($field);
        return "\"$field->name\":$wrap$value$wrap";
    }

    function toJson($result) {
        if($result->num_rows<=0) return "[]";
        $fields = $result->fetch_fields();
        $json = "[";
        $count = 0;
        while($row = $result->fetch_assoc()) {
            if(0!=$count) $json = $json.",";
            $json = $json."{";
            for($i=0;$i<count($fields);$i++) {
                if(0!=$i) $json = $json.",";
                $fieldName = $fields[$i]->name;
                $fieldContent = doColumn($fields[$i], $row[$fieldName]);
                $json = $json.$fieldContent;
            }
            $json = $json."}";
            $count++;
        }
        $json = $json."]";
        return $json;
    }
?>
