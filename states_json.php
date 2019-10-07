<?php
    header('Content-Type: application/json');
    require './config/DB.php';

    $query = "SELECT * FROM states WHERE country_id = :country_id";
    $country_id = 0;
    if(!isset($_GET['country_id']))
        die("No country id.");
    else
        $country_id = $_GET['country_id'];

    try {
        $db = new DB();
        $db = $db->connect();
        $statement = $db->prepare($query);
        $statement->bindParam(':country_id', $country_id);
        $statement->execute();

        $states = $statement->fetchAll(PDO::FETCH_OBJ);
        print_r(json_encode($states));

    } catch (PDOException $e) {
        die($e);
    }