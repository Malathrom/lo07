<?php

session_start();

function afficheVariable() {
    $liste = array("GET" => $_GET, "POST" => $_POST, "COOKIES" => $_COOKIE, "REQUEST" => $_REQUEST, "SESSION" => $_SESSION);
    foreach ($liste as $key => $value) {
        foreach ($value as $key2 => $val) {
            if (empty($val)) {
                echo "Entree nulle.<br/>";
            } else {
                if (is_array($val)) {
                    foreach ($val as $v) {
                        echo "In " . $key . " : " . "In " . $key2 . " : " . $val . "=>" . $v . "<br/>";
                    }
                } else {
                    echo "In " . $key . " : " . $key2 . "=>" . $val . "<br/>";
                }
            }
        };
    }
}

function posecookies() {
    foreach ($_REQUEST as $key => $val) {
        setcookie($key, $val);
    }
}

afficheVariable();

$cursus = [];
for ($j = 1; $j < $_GET["countline"] + 1; $j++) {
    $element = [];
    array_push($element, $_GET["numsem" . $j]);
    array_push($element, $_GET["label" . $j]);
    array_push($element, $_GET["sigle" . $j]);
    array_push($element, $_GET["categorie" . $j]);
    array_push($element, $_GET["affectation" . $j]);
    array_push($element, $_GET["utt" . $j]);
    array_push($element, $_GET["profil" . $j]);
    array_push($element, $_GET["credit" . $j]);
    array_push($element, $_GET["resultat" . $j]);
    array_push($cursus, $element);
}
print_r($cursus);

