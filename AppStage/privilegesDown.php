<?php 

require 'inc/bootstrap.php';
App::getAuth()->restrict();

$db = App::getDatabase();
if(isset($_GET['id']) && !empty($_GET['id'])) {
	$getid = $_GET['id'];
	$getstatus = $_GET['status'];
	$getstatusUpdate = $getstatus - 1;
	if($getstatusUpdate >= 0) {
		$req = $db->query('UPDATE users SET status='.$getstatusUpdate.' WHERE id = '.$getid.'');
	}
	header('Location: users_list.php');
}