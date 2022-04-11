<?php

//	AFFICHE 1 CV PARTICULIER

require_once("inc/header.php");

//appel de la bdd
//require_once("config/database.php");
require 'inc/bootstrap.php';
App::getAuth()->restrict();
$db = App::getDatabase();

//variable $req associé à une préparation de requête pour la bdd 
$req = $db->query('SELECT * FROM cv WHERE id = ?', [
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
<div class="container" id="cv">
	<div class="row mt-4">
		<h1 class="font-bold text-3xl">Curriculum Vitae <br></h1>
		<div class="col-md-3 text-sm">
			<h2 class="text-xl"><?= $result->first_name ?> <?= $result->last_name ?></h2>
			<br>
			Filière : <?= $result->filiere ?>
		</div>
		<div class="col-md-4">
			<h2 class="font-medium text-xl">Description</h2>		
			<p><br><?= $result->description ?></p>
		</div>
	</div>
</div>

<div class="px-12 py-2">
	<a href="AddCV.php" class="border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Ajouter un CV </a>
</div>

<div class="px-12 py-2">
	<a href="account.php" class="border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Retour </a>
</div>