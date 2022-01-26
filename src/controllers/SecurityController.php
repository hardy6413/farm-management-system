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

    public function index(){
        $this->render('login');
    }

    public function login(){
            if ($this->isPost() && $this->checkIfInputIsEmpty($this->messages)){
            $email = $_POST['email_'];
            $password = $_POST['password_'];
            $userAccount = $this->userAccountRepository->logIn($email);

            if (!$userAccount) {
                return $this->render('login',['messages' => ['User not found']] );
            }

            if ($userAccount->getEmail() !== $email){
                return $this->render('login', ['messages' => ['User with this email does not exist!']] );
            }

            if (!password_verify($password, $userAccount->getPassword())){
                return $this->render('login', ['messages' => ['Wrong password']] );
            }

            $this->createCookie($userAccount);

            if(isset($_SESSION['logged_in_user_farm_id'])){
                $farm = $this->farmRepository->getFarm($_SESSION['logged_in_user_farm_id']);

                $worker = $this->personalDataRepository->findByUserAccountId($_SESSION['logged_in_user_account_id']);

                return $this->render('profileOverview', ['farm' => $farm , 'worker' => $worker]);
            }else{
                $farms = $this->farmRepository->getFarms();
                return $this->render('farmsList', ['farms' => $farms]);
            }

        }else{
            return $this->render('login', ['messages' => $this->messages]);
        }

    }

    public function createAccount(){
        return $this->render('createAccount');
    }

    public function signUp(){
        if ($this->isPost()
            && $this->checkIfInputIsEmpty($this->messages)
            && $this->emailIsNotAlreadyInUse($_POST['email'])
            && $this->validateNotHashedPassword($_POST['password'])
        )
        {
                $hashedPassword = password_hash($_POST['password'],PASSWORD_BCRYPT);
                if ($hashedPassword !== false){
                    $address = new Address($_POST['street'],$_POST['city'],$_POST['postal-code'],$_POST['building-number']);

                    $personalData = new PersonalData($_POST['name'],$_POST['lastname'],$address,false);

                    $newUserAccount = new UserAccount($_POST['email'],$hashedPassword);

                    $this->personalDataRepository->createAccount($address,$personalData,$newUserAccount);

                    return $this->render('login');
                }else{
                    $this->messages[] = 'something went wrong, please try again';
                    return $this->render('createAccount', ['messages' => $this->messages]);
                }

            }else{
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

    private function checkIfHashIsSuccessful(){
        $hashedPassword = password_hash($_POST['password'],PASSWORD_BCRYPT);
        if ($hashedPassword === false){
            $this->messages[] = 'something went wrong, please try again';
            return false;
        }else{
            return $hashedPassword;
        }
    }

    private function validateNotHashedPassword($password): bool
    {
        if (strlen($password) < 4) {
            $this->messages[] = 'password is too short';
            return false;
        }else{
            return true;
        }
    }

    private function emailIsNotAlreadyInUse($email): bool
    {
        $exists = $this->userAccountRepository->getUserAccount($email);
        if ($exists === null){
            return true;
        }else{
            $this->messages[] = 'Email already in use';
            return false;
        }
    }


    private function createCookie(UserAccount $userAccount): void
    {
        $cookieValue = $userAccount->getEmail();
        if (!isset($_COOKIE[$this->cookieName])) {
            setcookie('user', $cookieValue, time() + (86400 * 30), "/");
        }
    }

}