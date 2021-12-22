<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/UserAccount.php';
require_once __DIR__.'/../repository/UserAccountRepository.php';

class SecurityController extends AppController
{
    private $cookieName;
    public function login(){
        session_start();
        $userAccountRepository = new UserAccountRepository();

        if (!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST['email_'];
        $password = $_POST['password_'];

        $userAccount = $userAccountRepository->getUserAccount($email);

        if (!$userAccount) {
            return $this->render('login',['messages' => ['User not found']] );
        }


        if ($userAccount->getEmail() !== $email){
            return $this->render('login', ['messages' => ['User with this email does not exist!']] );
        }

        if ($userAccount->getPassword() !== $password){
            return $this->render('login', ['messages' => ['Wrong password']] );
        }

        $cookieValue = $userAccount->getEmail();//todo to do sprawdzenia
        if(!isset($_COOKIE[$this->cookieName])){
            setcookie('user',$cookieValue,time() + (86400 * 30),"/");
        }
        if(isset($_SESSION['logged_in_user_farm_id'])){
            return $this->render('profileOverview');
        }

        return $this->render('farms');
        //$url = "http://$_SERVER[HTTP_HOST]";
        //header("Location: {$url}/farms");

    }

    public function logout(){
        session_start();
        session_destroy();
        if (isset($_COOKIE[$this->cookieName])) {
            setcookie($this->cookieName, '', time() - (86400 * 30), "/");
            return $this->render('login');
        }
    }
}