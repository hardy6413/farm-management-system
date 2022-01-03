<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Address.php';
require_once __DIR__ .'/../models/Farm.php';
require_once __DIR__.'/../repository/UserAccountRepository.php';
require_once __DIR__.'/../repository/FarmRepository.php';
require_once __DIR__.'/../repository/PersonalDataRepository.php';

class FarmController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $userRepository;
    private $farmRepository;
    private $personalDataRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserAccountRepository();
        $this->farmRepository = new FarmRepository();
        $this->personalDataRepository = new PersonalDataRepository();
        session_start();
    }


    public function createFarm(){
        if ($this ->isPost() && is_uploaded_file($_FILES['file']['tmp_name'])
            && $this->validateImage($_FILES['file'],self::MAX_FILE_SIZE,self::SUPPORTED_TYPES))
        {
            move_uploaded_file($_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']);


            $owner = $this->personalDataRepository->findByUserAccountId($_SESSION['logged_in_user_account_id']);
            $_SESSION['logged_in_personal_data_id'] = $owner->getId();//todo to zamienilem nazwe zmiennej w sesji
            if ($owner->isOwner()){
                $this->messages[] = 'You can not have two farms';
                return $this->render('createFarm', ['messages' => $this->messages]);
            }else{
                $owner->setIsOwner(true);
            }

            $address = new Address($_POST['street'],$_POST['city'],$_POST['postal-code'],$_POST['building-number']);
            $farm = new Farm($_POST['name'], $_FILES['file']['name'],1234,$address,array(), array($owner));
            $this->farmRepository->createFarm($farm,$_SESSION['logged_in_personal_data_id'] );
            //todo token jakos generowany
            return $this->render('farmsList', ['farms' => $this->farmRepository->getFarms()
                ,'messages' => $this->messages]);
        }
        return $this->render('createFarm', ['messages' => $this->messages]);
    }

    public function search(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->farmRepository->getFarmByName($decoded['search']));
        }
    }


    public function farmsList(){
        $farms = $this->farmRepository->getFarms();

        $this->render('farmsList', ['farms' => $farms]);
    }

    public function joinFarm(){
        if ($this->isPost()){
            $farmId = $this->farmRepository->getFarmByCode($_POST['code']);
            if ($farmId == null){
                $this->messages[] = 'wrong farm code!';
                return $this->render('farmsList', ['farms' => $this->farmRepository->getFarms()
                    ,'messages' => $this->messages]);
            }
            $_SESSION['logged_in_user_farm_id'] = $farmId;
            $this->personalDataRepository->joinFarm($farmId,$_SESSION['logged_in_personal_data_id']);

            return $this->render('profileOverview');
        }
        else{
            $this->messages[] = 'something went wrong';
            return $this->render('farmsList', ['farms' => $this->farmRepository->getFarms()
                ,'messages' => $this->messages]);
        }
    }



}