<?php
    header('Content-Type: application/json');
    require './config/DB.php';

    $query = "SELECT * FROM countries";

    try {
        $db = new DB();
        $db = $db->connect();
        $statement = $db->prepare($query);
        
        $statement->execute();

        $countries = $statement->fetchAll(PDO::FETCH_OBJ);
        print_r(json_encode($countries));

    } catch (PDOException $e) {
        die($e);
    }