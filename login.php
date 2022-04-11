<?php
require 'inc/bootstrap.php';
$auth = App::getAuth();
$db = App::getDatabase();
$auth->connectFromCookie($db);
if($auth->user()){
    App::redirect('account.php');
}
if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $user = $auth->login($db, $_POST['username'], $_POST['password'], isset($_POST['remember']));
    $session = Session::getInstance();
    if($user){
        $session->setFlash('success', 'Vous êtes maintenant connecté');
        $status_req = $db->query('SELECT status FROM users WHERE (username = :username OR email = :username)', ['username' => $_POST['username']])->fetch();
        $status = get_object_vars($status_req);
        if($status[status] == '3') {
            App::redirect('admin.php');
        } else {
            App::redirect('account.php');
        }
    }else{
        $session->setFlash('danger', 'Identifiant ou mot de passe incorrecte');
    }
}
?>
<?php require 'inc/header.php'; ?>

<div class="mt-20 h-screen">
    <form class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-lg" action="" method="POST">

        <div class="form-group">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="">Pseudo ou email</label>
            <input type="text" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
        </div>

        <div class="form-group">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="">Mot de passe</label>
            <input type="password" name="password" class="shadow appearance-none border border-green-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="*************"/>
        </div>

<!--
        <div class="items-center">
            <label class="inline-flex items-center mt-3">
                <input type="checkbox" name="remember" class="form-checkbox h-3 w-3 text-green-600" value="1"/> Se souvenir de moi
            </label>

        </div>
-->
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Se connecter</button>

    
    <a class="inline-block align-baseline font-bold text-sm text-green-500 hover:text-green-800 px-3" href="register.php">Pas de compte ? </a>
    <a class="inline-block align-baseline font-bold text-sm text-green-500 hover:text-green-800 px-3" href="forget.php"> Mot de passe oublié ? </a>
    </form>

</div>

<?php require 'inc/footer.php'; ?>