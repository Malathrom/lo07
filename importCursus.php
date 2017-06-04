<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (($handle = fopen("PRIOR_beatrice (1).csv", "r")) !== FALSE) {
    $cursus = [];
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        if ($data[0]== "EL"){
        $element = [];
        for ($c=0; $c < $num; $c++) {
            array_push($element, $data[$c]);
        }
        array_push($cursus, $element);
        }
    }
    print_r($cursus);
    fclose($handle);
}
?>