<?php

/*
  define('user', 'geninadr');
  define('code', "S8SkOod4");
  define('host', 'localhost');
  define('name', 'geninadr');
  $database = mysqli_connect(host, user, code, name) or die("Impossible de se connecter " + mysqli_connect_error()); */
try {

    $database = new PDO('mysql:host=localhost;dbname=lo07;charset=utf8', 'root', '');
} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}
