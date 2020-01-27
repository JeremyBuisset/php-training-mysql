<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<?php
		$value = $_GET["id"];
		//echo $value;

		/*Connexion variables*/
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "reunion_island";
		
		/*Initialize the connexion to database*/
				$conn = new mysqli($servername, $username, $password);
		
		
				/*Check if the connexion works*/
				if ($conn->connect_error):
					echo $conn->connect_error;
				else :
					/*Interact with the database for get the informations of the form ID*/
					$conn->select_db($dbname);
					$sql = "SELECT * FROM `hiking` WHERE `id`= $value";
					//echo $sql;
					$result = $conn->query($sql);
					// echo $conn->error;
					while ($row = $result->fetch_assoc()):
				
						


	?>

	<a href="read.php?">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="MAJ.php?id=$value" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?=$row["name"]?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?=$row["distance"]?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?=$row["duration"]?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?=$row["height_difference"]?>">
		</div>
		<input type="submit">
	</form>
					<?php endwhile;
	endif;


	?>
</body>
</html>
