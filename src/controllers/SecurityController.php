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

    public function createAccount(){
        return $this->render('createAccount');
    }

    public function signUp(){
        if ($this->isPost() && $this->emailValidation($_POST['email'])){
            if ($this->checkIfInputIsEmpty($this->messages)){
                $address = new Address($_POST['street'],$_POST['city'],$_POST['postal-code'],$_POST['building-number']);
                $personalData = new PersonalData($_POST['name'],$_POST['lastname'],$address,false);
                $newUserAccount = new UserAccount($_POST['email'],$_POST['password']);
                $this->personalDataRepository->createAccount($address,$personalData,$newUserAccount);
                return $this->render('login');
            }else{
                return $this->render('createAccount', ['messages' => $this->messages]);
            }
        }
        else{
            return $this->render('createAccount', ['messages' => $this->messages]);
        }

    }

    public function logout(){
        if (isset($_COOKIE[$this->cookieName])) {
            setcookie($this->cookieName, '', time() - (86400 * 30), "/");
        }
        session_unset();
        session_destroy();
        return $this->render('login');
    }

    private function emailValidation($email): bool
    {
        $exists = $this->userAccountRepository->getUserAccount($email);
        if ($exists === null){
            return true;
        }else{
            $this->messages[] = 'Email already in use';
            return false;
        }
    }

}