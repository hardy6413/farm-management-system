<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/ActionParam.php';
require_once __DIR__ .'/../models/FieldAction.php';
require_once __DIR__.'/../repository/FieldActionRepository.php';

class FieldActionController extends AppController
{
    private $fieldActionRepository;
    private $fieldRepository;

    public function __construct()
    {
        parent::__construct();
        $this->fieldActionRepository = new FieldActionRepository();
        $this->fieldRepository = new FieldRepository();
    }


    public function createAction($fieldId){
        if ($this->isPost() && strlen($_POST['action']) !== 0 && $fieldId !== null){
            $params = $this->createActionParams(strtolower($_POST['action']));
            $this->fieldActionRepository->addFieldAction($fieldId, $_SESSION['logged_in_personal_data_id'],$params,strtolower($_POST['action']));
            $this->render('fieldOverview', ['field' => $this->fieldRepository->findFieldById($fieldId)]);
        }else{
            $this->render('createAction', ['fieldId' => $fieldId]);
        }
    }


    private function createActionParams($actionName): ?array
    {
        $params = [];
        foreach($_POST as $name => $value) {
            if ($name != $actionName && strlen($value) !==0){
                $params [] = new ActionParam($name,$value);
            }
        }
        return $params;
    }

}