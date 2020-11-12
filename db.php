<?php
    $dsn = 'mysql:dbname=ajaxsubmit;host=127.0.0.1';
    $user = 'root';
    $password = 'root';

    try {
        $data = new PDO($dsn, $user, $password);
    }
    catch( PDOException $e ) {
        echo "Erreur SQL :", $e->getMessage();
    }