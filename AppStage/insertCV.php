<?php

// FONCTION D'INSERTION DANS LA BDD D'UN CV


// VOIR INSERTANN.PHP MÊME FONCTIONNEMENT
require 'inc/bootstrap.php';
App::getAuth()->restrict();
$pdo = new PDO("mysql:dbname=bdd_ensibs;host=localhost", 'root', '');
/*
require_once(dirname(__FILE__) . "/../config/database.php");
require_once(dirname(__FILE__) . "/../config/config.php");
*/
?>

<?php

// $req = $dbh->prepare('SELECT * FROM cv WHERE id = 1');
$first = $_POST["Fname"];
$last = $_POST["Lname"];
$des = $_POST["description"];
$stat =$_POST["statut"];
$fil = $_POST["filière"];			

$req = $pdo->prepare("INSERT INTO cv (`first_name`, `last_name`,`description`,`statut`,`filiere`) VALUES (?,?,?,?,?)");

$req -> bindParam(1, $first);
$req -> bindParam(2,$last);
$req -> bindParam(3,$des);
$req -> bindParam(4, $stat);
$req -> bindParam(5,$fil);

$req->execute();

/*
$req = $db->query("INSERT INTO cv SET `first_name` = ?, `last_name` = ?; `description` = ?, `status` = ?, `filière` = ?",[
	$first,
	$last,
	$des,
	$stat,
	$fil
]);
*/

// echo "yes";
// var_dump($first);
// var_dump($last);
// var_dump($des);
// var_dump($stat);
// var_dump($fil);
// var_dump($_POST);
// var_dump($req);

$id = $pdo->lastInsertId();

header("Location: CV.php?id=$id");
?>