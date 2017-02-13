<?php
    function getConfig($file, $name) {
        $str = file_get_contents("$file");
        if(!$str) return false;
        $arr = explode("\n", $str);
        $arrlength = count($arr);
        $map = array();
        for($x=0;$x<$arrlength;$x++) {
            $property = trim($arr[$x]);
            if(strpos($property, ":")) {
                $temp = explode(":", $property);
                if($temp[0]==$name) return $temp[1];
            }
        }
        return false;
    }
?>
