<?php

/* $etu doit être un tableau comportant 5 tableaux de 10 valeurs dont seules les 
 * deux premières ne seront pas nulles (ex: arrray('ID',12345,'','','','','','','','').
 * 
 * $cursus doit être un tableau de tableaux de 10  valeurs.
 */

function exportCursus($cursus,$etu){
    $nom =$etu[1][1];
    $prenom =[2][1];
    $file = $nom.'_'.$prenom.'.csv';
    $fp = fopen($file, 'w');
    
    foreach ($etu as $fields) {
        fputcsv($fp, $fields,';');
    }
    fputcsv($fp, array('==','s_seq','s_label','sigle','categorie','affectation','utt','profil','credit','resultat'));
    foreach ($cursus as $fields) {
        fputcsv($fp, $fields,";");
    }
    fputcsv($fp, arrray('END','','','','','','','','',''));
};

?>