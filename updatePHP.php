<?php
        /*Connexion variables*/
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "reunion_island";
        $value = 0;

        /*Initialize the connexion to database*/
        $conn = new mysqli($servername, $username, $password);


        /*Check if the connexion works*/
        if ($conn->connect_error){
            echo $conn->connect_error;
        } else {
            /*Interact with the database for get the informations of the form ID*/
            $conn->select_db($dbname);
            $sql = "SELECT * FROM `hiking` WHERE 1";
            //echo $sql;
            $result = $conn->query($sql);
            // echo $conn->error;
            while ($row = $result->fetch_assoc()) {
                $value ++;
                echo "<a href=update.php?id=$value>".$row['name']."<br></a>";
            }
        }
	?>