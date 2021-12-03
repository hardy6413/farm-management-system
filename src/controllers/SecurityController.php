<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/UserAccount.php';

class SecurityController extends AppController
{
    public function login(){
        $userAccount = new UserAccount('email@google.com','1234');

        if (!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST['email_'];
        $password = $_POST['password_'];

        if ($userAccount->getEmail() !== $email){
            return $this->render('login', ['messages' => ['User with this email does not exist!']] );
        }

        if ($userAccount->getPassword() !== $password){
            return $this->render('login', ['messages' => ['Wrong password']] );
        }

        return $this->render('farms');
        //$url = "http://$_SERVER[HTTP_HOST]";
        //header("Location: {$url}/farms");

    }
}