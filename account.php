<?php
require 'inc/bootstrap.php';
App::getAuth()->restrict();

$message = "";
if(!empty($_POST)){
 /*
    if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $_SESSION['flash']['danger'] = "Les mots de passes ne correspondent pas";
    }else{
        $user_id = $_SESSION['auth']->id;
        $password= password_hash($_POST['password'], PASSWORD_BCRYPT);
        require_once 'inc/db.php';
        $pdo->prepare('UPDATE users SET password = ? WHERE id = ?')->execute([$password, $user_id]);
        $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
    }
*/
    $pdo = new PDO("mysql:dbname=bdd_ensibs;host=localhost", 'root', '');
	if(isset($_POST['password']) && $_POST['password'] == $_POST['password_confirm']) {
		$user_id = $_SESSION['auth']->id;
		$user_password= password_hash($_POST['password'], PASSWORD_BCRYPT);
		require_once 'inc/db.php';
        $pdo->prepare('UPDATE users SET password = ? WHERE id = ?')->execute([$user_password, $user_id]);
        $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
	} else if(isset($_POST['email'])) {
		$user_id = $_SESSION['auth']->id;
		$user_email = $_POST['email'];
		require_once 'inc/db.php';
        $pdo->prepare('UPDATE users SET email = ? WHERE id = ?')->execute([$user_email, $user_id]);
        $_SESSION['flash']['success'] = "Votre email a bien été mis à jour";
	} else {
		$_SESSION['flash']['danger'] = "Les mots de passes ne correspondent pas";
	}
}

require 'inc/header.php';
?>

    <h1 class="px-32 mt-4 font-sans text-5xl">Bonjour <?= $_SESSION['auth']->username; ?></h1>

    <div class="px-16 mt-8 text-2xl">
    	<p class="mt-8 text-3xl">Mes informations : </p>
    		<li class="mt-4"> Nom d'utilisateur: <?= $_SESSION['auth']->username ?> </li>
    		<li> Adresse mail: <?= $_SESSION['auth']->email ?> </li>
			<li> Mes privilèges: <?= $_SESSION['auth']->status ?> </li>
	</div>

    <?php if($_SESSION['auth']->status == 3): ?>
    	<div class="ml-16 px-16 py-6 mt-16">
			<a href="admin.php" class="no-underline border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Espace administrateur </a>
		</div>
	<?php endif; ?>

    <?php if($_SESSION['auth']->status == 1): ?>
    <div class="ml-16 px-16 py-6 mt-2">
        <a href="AddCV.php" class="no-underline border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Ajouter un CV </a>
    </div>

    <div class="ml-16 px-16 py-6 mt-2">
        <a href="indexAnn.php" class="no-underline border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Consulter les annonces </a>
    </div>
    <?php endif; ?>

    <?php if($_SESSION['auth']->status == 2 || $_SESSION['auth']->status == 3): ?>
    <div class="ml-16 px-16 py-6 mt-2">
        <a href="AddAnn.php" class="no-underline border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Ajouter une annonce </a>
    </div>
    <?php endif; ?>

    <?php if($_SESSION['auth']->status == 2): ?>
    <div class="ml-16 px-16 py-6 mt-2">
        <a href="indexlog.php" class="no-underline border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> CV CyberLog </a>
    </div>

    <div class="ml-16 px-16 py-6 mt-2">
        <a href="indexdata.php" class="no-underline border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> CV CyberData </a>
    </div>
    <?php endif; ?>

	<div class="ml-16 px-16 py-6 mt-2">
		<a href="planning/planning.php" class="no-underline border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Planning </a>
	</div>

    <div class="question-wrap mx-8 mt-2">
	   <details class="question py-4 border-b border-grey-lighter">
	   	<summary class="flex items-center">Changer de mot de passe</summary>
        	<form action="" method="post">
        	    <div class="form-group">
        	    	<label class="block text-gray-700 text-sm font-bold mb-2 md:mt-4" for="">Nouveau mot de passe</label>
        	        <input type="password" name="password" class="shadow appearance-none border border-green-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight 	focus:outline-none focus:shadow-outline" placeholder="*************"/>
        	    </div>
        	    <div class="form-group">
        	    	<label class="block text-gray-700 text-sm font-bold mb-2 md:mt-4" for="">Confirmation du mot de passe</label>
        	        <input type="password" name="password_confirm" class="shadow appearance-none border border-green-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight 	focus:outline-none focus:shadow-outline" placeholder="*************"/>
        	    </div>
        	    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-2">Changer mon mot de passe</button>
        	</form>
	   </details>
    </div>

    <div class="question-wrap mx-8 mt-2">
	   <details class="question py-4 border-b border-grey-lighter">
	   	<summary class="flex items-center">Changer d'adresse mail</summary>
        <form action="" method="post">
            <div class="form-group">
            	<label class="block text-gray-700 text-sm font-bold mb-2 md:mt-4" for="">Nouvelle adresse mail</label>
                <input type="text" name="email" class="shadow appearance-none border border-green-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ex: ensibs@gmail.com"/>
            </div>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-2">Changer mon addresse mail</button>
        </form>
	   </details>
    </div>

<!--
	<details class="mt-16 ml-16 px-16 border-2 border-black w-4/6">
		<summary>Mon CV</summary>
    		<?php /*
    		App::getAuth()->restrict();
			$db = App::getDatabase();
			$username = $_SESSION['auth']->username;
        	$req = $db->query('SELECT username FROM cv');
        	while($cv = $req->fetch()){
        		if($cv->username != '' && print_r($cv->username) == $username){
        			echo "  :   attention, tu as déjà posté un CV, si tu en redépose un, l'ancien sera supprimé ";
        		};
        	}	*/
        	?>
			<form name="fo" method="POST" action="upload_file.php" enctype="multipart/form-data">
				<input type="file" name="monfichier" /><br/>
				<button type="submit" name="valider" value="Charger">Envoyer</button>
			</form>
	</details>

	<details class="mt-16 ml-16 px-16 border-2 border-black w-4/6">
		<summary>Lettre de motivation</summary>
    		<?php /*
    		App::getAuth()->restrict();
			$db = App::getDatabase();
			$username = $_SESSION['auth']->username;
        	$req = $db->query('SELECT username FROM motiv');
        	while($motiv = $req->fetch()){
        		if($motiv->username != '' && print_r($motiv->username) == $username){
        			echo "  :   attention, tu as déjà posté un CV, si tu en redépose un, l'ancien sera supprimé ";
        		};
        	}	*/
        	?>
			<form name="fo" method="POST" action="upload_file.php" enctype="multipart/form-data">
				<input type="file" name="lettremotiv" /><br/>
				<button type="submit" name="valider" value="Charger">Envoyer</button>
			</form>
	</details>
-->
    <div class="question-wrap mx-8 mt-2">
	   <details class="question py-4 border-b border-grey-lighter">
	   	<summary class="flex items-center">Conditions d'utilisation</summary>
        	<p class="md:mt-4">ICI ECRIRE CONDITIONS D'UTILISATION</p>
	   </details>
    </div>
<?php require 'inc/footer.php'; ?>