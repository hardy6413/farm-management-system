<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/UserAccount.php';
require_once __DIR__.'/../repository/UserAccountRepository.php';
require_once __DIR__.'/../repository/FarmRepository.php';

class SecurityController extends AppController
{
    private $cookieName;
    private $userAccountRepository;
    private $personalDataRepository;
    private $farmRepository;


    public function __construct()
    {
        parent::__construct();
        $this->cookieName = "user";
        $this->userAccountRepository = new UserAccountRepository();
        $this->farmRepository = new FarmRepository();
        $this->personalDataRepository = new PersonalDataRepository();
    }


    public function login(){
        if (!$this->isPost()){
            if (!isset($_COOKIE['user'])){
                $this->messages[] = 'session expired';
            }
            return $this->render('login');
        }

        $email = $_POST['email_'];
        $password = $_POST['password_'];
        $userAccount = $this->userAccountRepository->logIn($email);

        if (!$userAccount) {
            return $this->render('login',['messages' => ['User not found']] );
        }


        if ($userAccount->getEmail() !== $email){
            return $this->render('login', ['messages' => ['User with this email does not exist!']] );
        }

        if ($userAccount->getPassword() !== $password){
            return $this->render('login', ['messages' => ['Wrong password']] );
        }

        $cookieValue = $userAccount->getEmail();
        if(!isset($_COOKIE[$this->cookieName])){
            setcookie('user',$cookieValue,time() + (86400 * 30),"/");
        }
        if(isset($_SESSION['logged_in_user_farm_id'])){
            $farm = $this->farmRepository->getFarm($_SESSION['logged_in_user_farm_id']);
            $worker = $this->personalDataRepository->findByUserAccountId($_SESSION['logged_in_user_account_id']);

            return $this->render('profileOverview', ['farm' => $farm , 'worker' => $worker]);
        }

        $farms = $this->farmRepository->getFarms();
        return $this->render('farmsList', ['farms' => $farms]);
    }

    public function logout(){
        //todo logowanie i wylogowywanie  czy sesja jest aktywna
        if (isset($_COOKIE[$this->cookieName])) {
            setcookie($this->cookieName, '', time() - (86400 * 30), "/");
            session_unset();
            session_destroy();
            return $this->render('login');
        }//todo else
    }
}