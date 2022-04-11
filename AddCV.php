<?php

// PAGE D'AJOUT D'UN CV


require_once("inc/header.php");

?>

<div class="container mt-5">
	<h1 class="font-medium text-xl">Nouveau CV</h1>

	<!-- UTILISATION DE LA FONCTION INSERTANN.PHP POUR AJOUTER LE CV  via la method post-->
	<form action="insertCV.php" method="post" class="row g-3">
		<div class="col-md-6">
			<label for="first_name" class="form-label">Prénom :</label>
			<input type="text" class="form-control" placeholder="Entrez votre prénom" name="Fname" required>
		</div>
		<div class="col-md-6">
			<label for="last_name" class="form-label">Nom :</label>
			<input type="text" class="form-control" placeholder="Entrez votre nom" name="Lname" required>
		</div>
		<div class="form-group">
			<label for="description" class="form-label">Description :</label>
			<textarea type="text" class="form-control" placeholder="Entrez une description" name="description" rows="5" required></textarea>
		</div>
		<div class="form-group mb-2">
			<select name="statut" class="form-control" id="statut">
				<option value="Disponible">Disponible</option>
				<option value="Indisponible">Indisponible</option>
			</select>
		</div>
		<div class="form-group mb-2">
			<select name="filière" class="form-control" id="filière">
				<option value="Cyberlog">Cyberlog</option>
				<option value="Cyberdata">Cyberdata</option>
			</select>
		</div>

		<!-- ICI INUTILE POUR L'INSTANT MAIS DANS LA FONCTION INSERT.PHP RECUPERABLE VIA $fich = $_POST["fichier"]; -->
		<div class="container">
			<label for="PDF" class="form-label">PDF :</label>
			<br>
			<input type="file" class="file" data-browse-on-zone-click="true">

		</div>
		<div class="col-md-12">
			<input type="submit" value="Ajouter" class="btn btn-primary" name="fichier">
		</div>
	</form>
</div>

<div class="px-12 py-2 md:mt-4">
	<a href="account.php" class="border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Retour </a>
</div>