<?php


try {
    $pdo = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
 /*   foreach ($pdo->query('SELECT * from users') as $row) {
     print_r($row);
    } */
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
