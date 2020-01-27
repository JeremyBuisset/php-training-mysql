<?php
		/*Connexion variables*/
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "reunion_island";
		
		/*Initialize the connexion to database*/
		$conn = new mysqli($servername, $username, $password);
		
		/*Check if the connexion works*/
		if ($conn->connect_error){
			echo $conn->connect_error;
		} else {
			/*Interact with the database for get the informations of the form ID*/
			$conn->select_db($dbname);

            $stmt = $conn->prepare("INSERT INTO hiking (name, difficulty, distance, duration, height_difference) VALUES (?,?,?,?,?)");
             
            $name = $_POST["name"];
            $difficulty = $_POST["difficulty"];
            $distance = $_POST["distance"];
            $duration = $_POST["duration"];
            $height = $_POST["height_difference"];

			$stmt->bind_param('ssiii',$name, $difficulty, $distance, $duration, $height);


            
            $stmt -> execute();
            
        }
	?>