<?php
    include 'db.php';

        $query = $data->prepare('INSERT INTO CLIENT(nom, prenom) VALUES (?, ?)');
        $query->execute(array($_POST['nom'], $_POST['prenom']));