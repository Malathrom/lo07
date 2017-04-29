<?php
session_start();
function afficheVariable() {
    $liste = array("GET" => $_GET, "POST" => $_POST, "COOKIES" => $_COOKIE, "REQUEST" => $_REQUEST, "SESSION" => $_SESSION);
    foreach ($liste as $key => $value) {
        foreach ($value as $key2=>$val) {
            if (empty($val)) {
                echo "Entree nulle.<br/>";
            } else {
                if (is_array($val)) {
                    foreach ($val as $v) {
                        echo "In " . $key . " : " . "In " . $key2 . " : " . $v . "<br/>";
                    }
                } else {
                    echo "In " . $key . " : " . $val . "<br/>";
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