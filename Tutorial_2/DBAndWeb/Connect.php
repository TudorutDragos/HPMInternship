<?php

    $dbPass = "";
    $dbUser = "root";
    $dbServer = "localhost";
    $dbName = "Tutorial_2";

    $connection = new mysqli($dbServer,$dbUser,$dbPass,$dbName);

    print_r($connection);

    if($connection->connect_errno){
        exit("Database connection failed".$connection->connect_errno);
    }

    //$query = "DELETE FROM Actors WHERE id = 4";
    //$query = "UPDATE Actors SET movie = 'Avengers: Infinity War' WHERE id=2";
    //$query = "INSERT INTO Actors (firstName, lastName, movie) VALUES ('Hugh, Jackman, Wolverine)";
    //$query = "SELECT firstName, lastName, movie FROM Actors ORDER BY firstName";
    $query = "SELECT firstName, lastName, movie FROM Actors WHERE firstName = ?";
    $statment = $connection->prepare($query);

    $tempFirstName = "Robert Dawney Jr.";
    $statment->bind_param("s",$tempFirstName);
    $statment->execute();

    $statment->bind_result($firstName,$lastName,$movie);
    $statment->store_result();

    //$result = $connection->query($query);

    if($statment->num_rows>0){
        /*while($singleRow = $result->fetch_assoc()){
            print_r($singleRow);
        }*/
        while($statment->fetch()){
            echo $firstName." ".$lastName." ".$movie.PHP_EOL;
        }
    }

    $statment->close();
    //$result->close();
    $connection->close();
?>