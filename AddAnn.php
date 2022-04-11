<?php

// PAGE D'AJOUT D'UNE ANNONCE

// appel du header/footer plus bas
require 'inc/bootstrap.php';
App::getAuth()->restrict();
require_once("inc/header.php");
?>

<div class="container mt-5">
	<h1 class="font-medium text-xl">Nouvelle Annonce</h1>

	<!-- UTILISATION DE LA FONCTION INSERTANN.PHP POUR AJOUTER L'ANNONCE  via la method post-->
	<form action="insertAnn.php" method="post" class="row g-3">
		<div class="col-md-6">
			<label for="title" class="form-label">Titre de l'annonce</label>
			<input type="text" class="form-control" placeholder="Affection-Entreprise" name="Title" required>
		</div>
		<div class="form-group">
			<label for="description" class="form-label">Description :</label>
			<textarea type="text" class="form-control" placeholder="Entrez une description" name="Description" rows="5" required></textarea>
		</div>
		<div class="col-md-6">
			<label for="title" class="form-label">Localisation :</label>
			<input type="text" class="form-control" placeholder="Localisation" name="Location" required>
		</div>
		<div class="col-md-6">
			<label for="title" class="form-label">Contrat :</label>
			<input type="text" class="form-control" placeholder="Type de contrat" name="Contract_type" required>
		</div>
		<div class="col-md-2 mb-3">
			<label for="last name" class="form-label">Début :</label>
			<input type="date" class="form-control" min="2021-01-01" max="2023-01-01" name="Begin_at" required>
		</div>
		<div class="col-md-2 mb-3">
			<label for="last name" class="form-label">Fin :</label>
			<input type="date" class="form-control" min="2021-01-01" max="2023-01-01" name="End_at" required>
		</div>
		<!-- CONTAINER POUR AJOUTER UN FICHIER -->

		<!-- <div class="container">
			<label for="PDF" class="form-label">PDF</label>
			<br>
			<input type="file" class="file" data-browse-on-zone-click="true">

		</div> -->
		<div class="col-md-12">
			<input type="submit" value="Ajouter" class="btn btn-primary">
		</div>
	</form>
</div>

<div class="px-12 py-2 md:mt-4">
	<a href="account.php" class="border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Retour </a>
</div>