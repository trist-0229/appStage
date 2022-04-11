<?php
class App{

    static $db = null;

    static function getDatabase(){
        if(!self::$db){
            self::$db = new Database('root', '', 'bdd_ensibs');
        }
        return self::$db;
    }

    static function getAuth(){
        return new Auth(Session::getInstance(), ['restriction_msg' => 'Tu ne peux pas aller là !']);
    }

    static function redirect($page){
        header("Location: $page");
        exit();
    }

}