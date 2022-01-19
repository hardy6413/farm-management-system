<?php
require_once 'AppController.php';
require_once __DIR__.'/../repository/PersonalDataRepository.php';

class WorkersController extends AppController
{
    private $personalDataRepository;
    private $farmRepository;

    public function __construct()
    {
        parent::__construct();
        $this->personalDataRepository = new PersonalDataRepository();
        $this->farmRepository = new FarmRepository();
    }

    public function listWorkers(){
        $workers = $this->personalDataRepository->findWorkersFromTheSameFarm();
        $this->render("workers", ['workers' => $workers]);
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
    }

}