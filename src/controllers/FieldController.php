<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/FieldRepository.php';

class FieldController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
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

    public function createField(){
        if ($this ->isPost() && is_uploaded_file($_FILES['file']['tmp_name'])
            && $this->validateImage($_FILES['file'],self::MAX_FILE_SIZE,self::SUPPORTED_TYPES)){
            move_uploaded_file($_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']);

            if (isset($_POST['is-property'])){
                $field = new Field($_POST['name'],$_POST['description'],$_POST['area'],$_POST['extra-payment'],
                    $_POST['block-number'], $_POST['is-property'], $_FILES['file']['name']);
            }else{
                $field = new Field($_POST['name'],$_POST['description'],$_POST['area'],$_POST['extra-payment'],
                    $_POST['block-number'], false, $_FILES['file']['name']);
            }
            if (isset($_SESSION['logged_in_user_farm_id'])){
                $this->fieldRepository->createField($field, $_SESSION['logged_in_user_farm_id']);
            }
            $this->fields();
        }else{
            return $this->render('addField', ['messages' => $this->messages]);
        }
    }

    public function addField(){
        $this->render('addField');
    }

    public function fieldOverview(){
        $this->render('fieldOverview');
    }
}