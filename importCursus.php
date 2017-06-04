<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getCursusCsV($csv) {
    if (($handle = fopen($csv, "r")) !== FALSE) {
        $cursus = [];
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $num = count($data);
            if ($data[0] == "EL") {
                $element = [];
                for ($c = 0; $c < $num; $c++) {
                    array_push($element, $data[$c]);
                }
                array_push($cursus, $element);
            }
        }
        fclose($handle);
    }
    return $cursus;
}

function getEtuCsV ($csv) {
    if (($handle = fopen($csv, "r")) !== FALSE) {
        $cursus = [];
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            if ($data[0] == "ID") {
                $element = [];
                
                array_push($element, $data[0], $data[1]);
                
                array_push($cursus, $element);
            }
            if ($data[0] == "NO") {
                $element = [];
                
                array_push($element, $data[0], $data[1]);
                
                array_push($cursus, $element);
            }
            if ($data[0] == "PR") {
                $element = [];
                
                array_push($element, $data[0], $data[1]);
                
                array_push($cursus, $element);
            }
            if ($data[0] == "AD") {
                $element = [];
                
                array_push($element, $data[0], $data[1]);
                
                array_push($cursus, $element);
            }
            if ($data[0] == "FI") {
                $element = [];
                
                array_push($element, $data[0], $data[1]);
                
                array_push($cursus, $element);
            }
        }
        fclose($handle);
    }
    return $cursus;
}
?>