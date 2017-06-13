<?php

/* $etu doit être un tableau de 5 éléments.
 * $cursus doit être un tableau de tableaux de 9 éléments.
 */

function exportCursus($cursus, $etu) {
    $nom = $etu[1];
    $prenom = [2];
    $file = $nom . '_' . $prenom . '.csv';
    $fp = fopen($file, 'w');
    $nb = 1;
    if ($data = fgetcsv($fp, 1000, ";") == FALSE) {
        $etu_csv = [
            array('ID', $etu[0], '', '', '', '', '', '', '', ''),
            array('NO', $etu[1], '', '', '', '', '', '', '', ''),
            array('PR', $etu[2], '', '', '', '', '', '', '', ''),
            array('AD', $etu[3], '', '', '', '', '', '', '', ''),
            array('FI', $etu[4], '', '', '', '', '', '', '', '')
        ];
        foreach ($etu_csv as $fields) {
            fputcsv($fp, $fields, ';');
        }
        fputcsv($fp, array('==', 's_seq', 's_label', 'sigle', 'categorie', 'affectation', 'utt', 'profil', 'credit', 'resultat'));
        foreach ($cursus as $fields) {
            array_unshift($fields, 'EL');
            fputcsv($fp, $fields, ";");
        }
        fputcsv($fp, array('END', '', '', '', '', '', '', '', '', ''));
    } else {
        $file = $nom . '_' . $prenom . '(' . $nb . ').csv';
        $fp = fopen($file, 'w');
        while ($data = fgetcsv($fp, 1000, ";") == TRUE) {
            $nb += 1;
        }
        $etu_csv = [
            array('ID', $etu[0], '', '', '', '', '', '', '', ''),
            array('NO', $etu[1], '', '', '', '', '', '', '', ''),
            array('PR', $etu[2], '', '', '', '', '', '', '', ''),
            array('AD', $etu[3], '', '', '', '', '', '', '', ''),
            array('FI', $etu[4], '', '', '', '', '', '', '', '')
        ];
        foreach ($etu_csv as $fields) {
            fputcsv($fp, $fields, ';');
        }
        fputcsv($fp, array('==', 's_seq', 's_label', 'sigle', 'categorie', 'affectation', 'utt', 'profil', 'credit', 'resultat'));
        foreach ($cursus as $fields) {
            array_unshift($fields, 'EL');
            fputcsv($fp, $fields, ";");
        }
        fputcsv($fp, array('END', '', '', '', '', '', '', '', '', ''));
    }
}

;
?>