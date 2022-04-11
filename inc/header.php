<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Roboto&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="dist/css/style.css">

    <title>AppStage ENSIBS</title>

</head>

<?php require_once(dirname(__FILE__)."\..\class\Session.php");
//App::getAuth()->restrict();
 ?>

<body>

<div class="header-2 border-b-2 border-green-600">
    <nav class="bg-white py-2 md:py-4">
        <div class="container px-4 mx-auto md:flex md:items-center">
            <div class="flex justify-between items-center">
                <a href="../AppStage/index.php" class="no-underline p-2 lg:px-4 md:mx-2 text-white rounded bg-green-600">AppStage</a>
                <a href="contact.php" class="no-underline p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Contact</a>
            </div>
            <div id="navbar-collapse" class="hidden items-baseline md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0">
                
                    <?php 
                    if (isset($_SESSION['auth'])): ?>
                    	<a href="../AppStage/account.php" class="border-0 no-underline p-2 lg:px-4 md:mx-2 text-green-600 text-center border border-transparent rounded hover:bg-green-100 hover:text-green-700 transition-colors duration-300">Profil</a>
                        <a href="../AppStage/logout.php" class="border-0 no-underline p-2 lg:px-4 md:mx-2 text-green-600 text-center border border-transparent rounded hover:bg-green-100 hover:text-green-700 transition-colors duration-300">Se déconnecter</a>
                    <?php else: ?>  
                        <a href="../AppStage/login.php" class="border-0 no-underline p-2 lg:px-4 md:mx-2 text-green-600 text-center border border-transparent rounded hover:bg-green-100 hover:text-green-700 transition-colors duration-300">Se connecter</a>
                        <a href="../AppStage/register.php" class="border-0 no-underline p-2 lg:px-4 md:mx-2 text-green-600 text-center border border-solid border-green-600 rounded hover:bg-green-600 hover:text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1">S'inscrire</a>
                    <?php endif; ?>
                
            </div>
        </div>
    </nav>
</div>

<div class="container">
    <?php if(Session::getInstance()->hasFlashes()): ?>
        <?php foreach(Session::getInstance()->getFlashes() as $type => $message): ?>
        <div class="flex flex-col justify-center w-screen mt-8">
            <div class="w-96 bg-white-100 border border-black-400 text-balck-700 px-3 py-2 rounded relative">
                <?= $message; ?>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>

