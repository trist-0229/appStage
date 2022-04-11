<?php 

require 'inc/bootstrap.php';
App::getAuth()->restrict();

$db = App::getDatabase();
if(isset($_GET['id']) && !empty($_GET['id'])) {
	$getid = $_GET['id'];
	$req = $db->query('DELETE FROM users WHERE id = '.$getid.'');
	header('Location: users_list.php');
}