<?php 
	require 'inc/bootstrap.php';
  	App::getAuth()->restrict();

	if(!isset($_SESSION['auth'])) {
		header('Location: index.php');
	}
	require 'inc/header.php';
?>

<div class="mt-16 px-8 py-6">
	<a href="account.php" class="no-underline border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Mon espace </a>
</div>
<div class="px-8 py-6">
	<a href="users_list.php" class="no-underline border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Liste des utilisateurs </a>
</div>
<div class="px-8 py-6">
	<a href="cv_list.php" class="no-underline border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Liste des CV</a>
</div>
<div class="px-8 py-6">
	<a href="annonce_list.php" class="no-underline border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Liste des annonces de stages</a>
</div>
