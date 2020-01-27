<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table>
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
            $sql = "SELECT * FROM `hiking` WHERE 1";
            //echo $sql;
            $result = $conn->query($sql);
            // echo $conn->error;
            while ($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row["name"] . "</td>" . "<td>" . $row["difficulty"] . "</td>" . "<td>" . $row["distance"] . " kilomètres</td>" .
                  "<td>" . $row["duration"] . " heures</td>" . "<td>" . $row["height_difference"] . " mètres</td></tr>";
          }
        }
        ?>
      <!-- Afficher la liste des randonnées -->
    </table>
  </body>
</html>
