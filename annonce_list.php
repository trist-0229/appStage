<?php

// ANNONCE THEQUE
require 'inc/bootstrap.php';
App::getAuth()->restrict();
require_once("inc/header.php");
$db = App::getDatabase();

?>

<div class="container md:mt-8">
	<h1 class="font-bold text-3xl">Liste des Annonces</h1>
	<div class="row mt-3">
				
		<div class="col-md-12">
			<div class="card" >
				<ul class="list-group list-group-flush">

					<!-- RECUPERATION DE TOUTES LES ANNONCES ET LEURS AFFICHAGE VIA WHILE LOOP -->
					<?php
					$req = $db->query("SELECT * FROM annonce");
					while($result = $req->fetch()) : ?> <!-- $result récupère, dans une liste, la reponse de la bdd  -->
						<li class="list-group-item">
							
							<!-- redirection vers hf avec le transfert de id -->
							<a href="Annonce.php?id=<?= $result->id ?>">
								<h4 class="text-xl"><?= $result->title ?></h4>
							</a>
							<!-- FONCTION substr ne prend que le x mots de la description -->
							<p><?= substr($result->description,0,100) ?>...</p>
							<small><?= $result->contract_type ?>, commence le : <?= $result->begin_at ?></small>
							<div> Supprimer l'annonce' : <a href="delete_annonce.php?id=<?= $result->id ?>" class="no-underline">❌</a></div>
						</li>
					<?php endwhile

					?>
				</ul>
			</div>
		</div>
		
	</div>
</div>

<div class="px-8 py-6 md:mt-4">
	<a href="admin.php" class="no-underline border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Retour</a>
</div>
