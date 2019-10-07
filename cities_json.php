<?php
    header('Content-Type: application/json');
    require './config/DB.php';

    $query = "SELECT * FROM cities WHERE state_id = :state_id";
    $state_id = 0;
    if(!isset($_GET['state_id']))
        die("No state id.");
    else
        $state_id = $_GET['state_id'];

    try {
        $db = new DB();
        $db = $db->connect();
        $statement = $db->prepare($query);
        $statement->bindParam(':state_id', $state_id);
        $statement->execute();

        $cities = $statement->fetchAll(PDO::FETCH_OBJ);
        print_r(json_encode($cities));

    } catch (PDOException $e) {
        die($e);
    }