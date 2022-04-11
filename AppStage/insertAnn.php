<?php

require 'inc/bootstrap.php';
App::getAuth()->restrict();
$pdo = new PDO("mysql:dbname=bdd_ensibs;host=localhost", 'root', '');
?>

<?php

$tit = $_POST["Title"];
$des = $_POST["Description"];
$beg = $_POST["Begin_at"];
$end =$_POST["End_at"];
$cont = $_POST["Contract_type"];
$loc = $_POST["Location"];

$req = $pdo->prepare("INSERT INTO annonce (`title`, `description`,`begin_at`,`end_at`,`contract_type`,`location`) VALUES (?,?,?,?,?,?)");
			
$req -> bindParam(1, $tit);
$req -> bindParam(2, $des);
$req -> bindParam(3, $beg);
$req -> bindParam(4, $end);
$req -> bindParam(5, $cont);
$req -> bindParam(6, $loc);

$req->execute();

$id = $pdo->lastInsertId();

header("Location: Annonce.php?id=$id");
?>