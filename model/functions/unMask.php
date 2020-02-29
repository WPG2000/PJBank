<?php

    function unMask($value){
        $value = trim($value);
        $value = str_replace(".", "", $value);
        $value = str_replace(",", "", $value);
        $value = str_replace("-", "", $value);
        $value = str_replace("/", "", $value);
        $value = str_replace(",", "", $value);
        return $value;
    }

?>