<?php
require_once 'AppController.php';
require_once __DIR__.'/../repository/PersonalDataRepository.php';

class WorkersController extends AppController
{
    private $personalDataRepository;
    private $userAccountRepository;
    private $farmRepository;

    public function __construct()
    {
        parent::__construct();
        $this->personalDataRepository = new PersonalDataRepository();
        $this->userAccountRepository = new UserAccountRepository();
        $this->farmRepository = new FarmRepository();
        session_start();
    }


    public function listWorkers(){
        $workers = $this->personalDataRepository->findWorkersFromTheSameFarm();
        $this->render("workers", ['workers' => $workers]);
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

    public function account(){
        $this->render("account");
    }

    public function settings(){
        $this->render("settings");
    }

    public function profileOverview(){
        $farm = $this->farmRepository->getFarm($_SESSION['logged_in_user_farm_id']);
        $worker = $this->personalDataRepository->findByUserAccountId($_SESSION['logged_in_user_account_id']);

        return $this->render('profileOverview', ['farm' => $farm , 'worker' => $worker]);
        $this->render("profileOverview");
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