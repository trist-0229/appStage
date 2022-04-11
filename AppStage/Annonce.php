<?php

//	AFFICHE 1 ANNONCE PARTICULIERE

require_once("inc/header.php");

//appel de la bdd
require 'inc/bootstrap.php';
App::getAuth()->restrict();
$db = App::getDatabase();

//variable $req associé à une préparation de requête pour la bdd 
$req = $db->query('SELECT * FROM annonce WHERE id = ?', [
	$_GET["id"]
]);

//association du paramètre :id récupérer via la method GET dans le href de l'index
//$req->bindParam(':id', $_GET["id"]);

//exécution de la requête
//$req->execute();


// $result est une liste contenant la réponse de la bdd
$result = $req->fetch();
?>

<!-- voir les colonnes de la bdd pour savoir à quoi correspond chaque $result[""] -->
<div class="container" id="annonce">
	<div class="row mt-4">
		<h1 class="font-bold text-3xl">Annonce <br> <br></h1>
		<div class="col-md-3 text-sm">
			<h2 class="text-xl"><?= $result->title ?></h2>
			<br>
			Contrat : <?= $result->contract_type ?>
			<br>
			Lieu : <?= $result->location ?>
			<br>
			De <?= $result->begin_at ?> à <?= $result->end_at ?>
		</div>
		<div class="col-md-4">
			<h2 class="font-medium text-xl">Description</h2>		
			<p><br><?= $result->description ?></p>
		</div>
	</div>
</div>

<div class="px-12 py-2">
	<a href="AddAnn.php" class="border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Ajouter une annonce </a>
</div>

<div class="px-12 py-2">
	<a href="account.php" class="border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Retour </a>
</div>
