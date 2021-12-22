<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/PersonalDataRepository.php';

class WorkersController extends AppController
{
    private $personalDataRepository;


    public function __construct($personalDataRepository)
    {
        parent::__construct();
        $this->personalDataRepository = $personalDataRepository;
    }


    public function workers(){
        //$workers = $this->personalDataRepository->findWorkersByFarm(int $farmId);
//todo
        //$this->render("workers", ['workers' => $workers]);
    }

}