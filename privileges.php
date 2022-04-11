<?php 

require 'inc/bootstrap.php';
App::getAuth()->restrict();

$db = App::getDatabase();
if(isset($_GET['id']) && !empty($_GET['id'])) {
	$getid = $_GET['id'];
	if($getid < 3) {
		$req = $db->query('UPDATE users SET status='.$getid++.' WHERE id = '.$getid.'');
		header('Location: users_list.php');
	}
	header('Location: users_list.php');
}