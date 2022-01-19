<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/FarmController.php';
require_once 'src/controllers/FieldController.php';
require_once 'src/controllers/TaskController.php';
require_once 'src/controllers/WorkersController.php';
require_once 'src/controllers/FieldActionController.php';

class Router {

    public static $routes;
    private static $controller;

    public static function get($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function post($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function run ($url) {

        $urlParts = explode("/", $url);
        $action = $urlParts[0];

        if (!array_key_exists($action, self::$routes)) {
            die("Wrong url!");
        }

        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if ((!isset($_COOKIE['user'])
                || !isset($_SESSION['logged_in_user_account_id'])
                || !isset($_SESSION['logged_in_personal_data_id']))
            && ( $action !== 'createAccount' && $action !== 'login' && $action !== 'signUp')){
            self::$controller = self::$routes['login'];
            $action = 'login';
        }else{
            self::$controller = self::$routes[$action];
        }

        $object = new self::$controller;
        $action = $action ?: 'index';

        if (isset($urlParts[1])){
            $id = intval($urlParts[1]);
        }else{
            $id ='';
        }

        $object->$action($id);
    }

}