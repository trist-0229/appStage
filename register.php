<?php
require_once 'inc/bootstrap.php';

// Je veux récupérer le premier utilisateur

if(!empty($_POST)){

    $errors = array();

    $db = App::getDatabase();
    $validator = new Validator($_POST);
    $validator->isAlpha('username', "Votre pseudo n'est pas valide (alphanumérique)");
    if($validator->isValid()){
        $validator->isUniq('username', $db, 'users', 'Ce pseudo est déjà pris');
    }
    $validator->isEmail('email', "Votre email n'est pas valide");
    if($validator->isValid()){
        $validator->isUniq('email', $db, 'users', 'Cet email est déjà utilisé pour un autre compte');
    }
    $validator->isConfirmed('password', 'Vous devez rentrer un mot de passe valide');

    if($validator->isValid()){

        App::getAuth()->register($db, $_POST['username'], $_POST['password'], $_POST['email']);
        Session::getInstance()->setFlash('success', 'Un email de confirmation vous a été envoyé pour valider votre compte');
        App::redirect('login.php');

    } else {
        $errors = $validator->getErrors();
    }


}
?>

<?php require 'inc/header.php'; ?>


<?php if(!empty($errors)): ?>
<div class="md:mt-8 item-center alert alert-danger">
    <p class="md:text-center">Vous n'avez pas rempli le formulaire correctement</p>
    <ul class="md:text-center">
        <?php foreach($errors as $error): ?>
           <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<div class="h-screen py-16">
    <form class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-lg" action="" method="POST">
        <h2 class="block text-gray-700 text-sm font-bold mb-2 text-center">Inscription</h2>
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="">Pseudo</label>
            <input type="text" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
        </div>
    
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="">Email</label>
            <input type="text" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
        </div>
    
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="">Mot de passe</label>
            <input type="password" name="password" class="shadow appearance-none border border-green-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none   focus:shadow-outline" placeholder="*************"/>
        </div>
    
        <div class="">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="">Confirmez votre mot de passe</label>
            <input type="password" name="password_confirm"  class="shadow appearance-none border border-green-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight     focus:outline-none focus:shadow-outline" placeholder="*************"/>
        </div>
    
        <div class="">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">S'inscrire</button>
        </div>

    </form>
</div>

