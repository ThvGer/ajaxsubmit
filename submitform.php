<?php
    include 'db.php';
    $result = ['nom' => false, 'prenom' => false];
    $error = 0;

    if(strlen($_POST['nom']) < 6){
      $result['nom'] = true;
      $error = 1;
    }

    if(strlen($_POST['prenom']) < 6){
      $result['prenom'] = true;
      $error = 1;
    }


    if(!$error){
      $query = $data->prepare('INSERT INTO CLIENT(nom, prenom) VALUES (?, ?)');
      $query->execute(array($_POST['nom'], $_POST['prenom']));
    }


    echo json_encode($result);