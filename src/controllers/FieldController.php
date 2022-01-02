<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/FieldRepository.php';

class FieldController extends AppController
{
    private $fieldRepository;

    public function __construct()
    {
        parent::__construct();
        $this->fieldRepository = new FieldRepository();
        session_start();
    }

    public function fields(){
        $fields = $this->fieldRepository->findFieldsByFarm();
        $this->render("fields", ['fields' => $fields]);
    }




    public function addField(){
        $this->render('addField');
    }

    public function fieldOverview(){
        $this->render('fieldOverview');
    }
}