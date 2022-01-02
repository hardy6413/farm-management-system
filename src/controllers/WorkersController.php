<?php
require_once 'AppController.php';
require_once __DIR__.'/../repository/PersonalDataRepository.php';

class WorkersController extends AppController
{
    private $personalDataRepository;
    private $userAccountRepository;
    private $messages = [];

    public function __construct()
    {
        parent::__construct();
        $this->personalDataRepository = new PersonalDataRepository();
        $this->userAccountRepository = new UserAccountRepository();
        session_start();
    }


    public function workers(){
        $workers = $this->personalDataRepository->findWorkersByFarm();
        $this->render("workers", ['workers' => $workers]);
    }

    public function createAccount(){
        return $this->render('createAccount');
    }

    public function signUp(){
        if ($this->isPost() && $this->emailValidation($_POST['email'])){
            $address = new Address($_POST['street'],$_POST['city'],$_POST['postal-code'],$_POST['building-number']);
            $personalData = new PersonalData($_POST['name'],$_POST['lastname'],$address,false);
            $newUserAccount = new UserAccount($_POST['email'],$_POST['password']);
            $this->personalDataRepository->createAccount($address,$personalData,$newUserAccount);
            return $this->render('login');
        }
        else{
            return $this->render('createAccount', ['messages' => $this->messages]);
        }

    }

    private function emailValidation($email){
        $exists = $this->userAccountRepository->getUserAccount($email);
        if ($exists === null){
            return true;
        }else{
            $this->messages[] = 'Email already in use';
            return false;
        }
    }


}