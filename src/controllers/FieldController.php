<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/FieldRepository.php';

class FieldController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $fieldRepository;

    public function __construct()
    {
        parent::__construct();
        $this->fieldRepository = new FieldRepository();
    }

    public function fields(){
        if (!isset($_SESSION['logged_in_user_farm_id'])){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
        $fields = $this->fieldRepository->findFieldsByFarm();
        $this->render("fields", ['fields' => $fields]);
    }

    public function addField(){
        if ($this ->isPost() && is_uploaded_file($_FILES['file']['tmp_name'])
            && $this->validateImage($_FILES['file'],self::MAX_FILE_SIZE,
                self::SUPPORTED_TYPES,$this->messages)){
            move_uploaded_file($_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']);

            if ($this->checkIfInputIsEmpty($this->messages)){
                if (isset($_POST['is-property'])){
                    $field = new Field($_POST['name'],$_POST['description'],$_POST['area'],$_POST['extra-payment'],
                        $_POST['block-number'], $_POST['is-property'], $_FILES['file']['name'],null); //field is a property
                }else{
                    $field = new Field($_POST['name'],$_POST['description'],$_POST['area'],$_POST['extra-payment'], //field is not an owners property
                        $_POST['block-number'], false, $_FILES['file']['name'],null);
                }
                if (isset($_SESSION['logged_in_user_farm_id'])){
                    $this->fieldRepository->createField($field, $_SESSION['logged_in_user_farm_id']);
                }
                return $this->fields();
            }else{
                return $this->render('addField', ['messages' => $this->messages]);
            }
        }else{
            return $this->render('addField', ['messages' => $this->messages]);
        }
    }


    public function fieldOverview($id){
        $field = $this->fieldRepository->findFieldById($id);
        return $this->render('fieldOverview',['field' => $field]);
    }

    public function searchFields(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);
            $w = $this->fieldRepository->getFarmsFieldsByName($decoded['search']);
            $test = json_encode($this->fieldRepository->getFarmsFieldsByName($decoded['search']));
            echo json_encode($this->fieldRepository->getFarmsFieldsByName($decoded['search']));
        }
    }
}