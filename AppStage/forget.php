<?php
require 'inc/bootstrap.php';
if(!empty($_POST) && !empty($_POST['email'])){
    $db = App::getDatabase();
    $auth = App::getAuth();
    $session = Session::getInstance();
    if($auth->resetPassword($db, $_POST['email'])){
        $session->setFlash('success', 'Les instructions du rappel de mot de passe vous ont été envoyées par emails');
        App::redirect('login.php');
    } else {
        $session->setFlash('danger', 'Aucun compte ne correspond à cet adresse');
    }
}
?>
<?php require 'inc/header.php'; ?>

<div class="h-screen py-16">
    <form class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-lg" action="" method="POST">

        <h1 class="block text-gray-700 text-sm font-bold mb-2 text-center">Mot de passe oublié</h1>

        <div class="form-group">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="">Email</label>
            <input type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
        </div>

        <div class="flex flex-col items-center justify-center mt-4">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Envoyer</button>
        </div>

    </form>

    <div class="px-12 py-2 md:mt-4">
        <a href="login.php" class="no-underline border-2 border-black p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Retour </a>
    </div>
</div>

