<?php 

require 'inc/bootstrap.php';
App::getAuth()->restrict();

$db = App::getDatabase();
if(isset($_GET['id']) && !empty($_GET['id'])) {
	$getid = $_GET['id'];
	$req = $db->query('DELETE FROM annonce WHERE id = '.$getid.'');
	header('Location: cv_list.php');
}