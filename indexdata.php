<?php

// CVTHEQUE CYBERDATA

require 'inc/bootstrap.php';
require_once("inc/header.php");
App::getAuth()->restrict();
$db = App::getDatabase();
?>

<div class="container">
	<h1 class="font-bold text-3xl">Liste Curriculum Vitae, Cyberdata</h1>
	<div class="row mt-3">
				
		<div class="col-md-12">
			<div class="card" >
				<ul class="list-group list-group-flush">

					<!-- RECUPERATION DE TOUT LES CV cyberdata ET LEURS AFFICHAGE VIA WHILE LOOP -->
					<?php
					$req = $db->query("SELECT * FROM cv WHERE filiere = 'Cyberdata'");
					while($result = $req->fetch()) : ?> <!-- $result récupère, dans une liste, la reponse de la bdd  -->
						<li class="list-group-item">

							<!-- redirection vers hf avec le transfert de id -->
							<a href="CV.php?id=<?= $result->id ?>">
								<h4 class="text-xl"><?= $result->first_name ?> <?= $result->last_name ?></h4>
							</a>

							<!-- FONCTION substr ne prend que le x mots de la description -->
							<p><?= substr($result->description,0,100) ?></p>
							<small><?= $result->filiere ?> <?= $result->statut ?></small>
						</li>
					<?php endwhile

					?>
				</ul>
			</div>
		</div>
		
	</div>
</div>

<div class="px-12 py-2">
	<a href="account.php" class="border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Retour </a>
</div>