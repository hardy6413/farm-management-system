<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Address.php';
require_once __DIR__ .'/../models/Farm.php';
require_once __DIR__.'/../repository/UserAccountRepository.php';
require_once __DIR__.'/../repository/FarmRepository.php';

class FarmController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];

    private $userRepository;
    private $farmRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserAccountRepository();
        $this->farmRepository = new FarmRepository();
    }


    public function createFarm(){
        session_start();
        if ($this ->isPost() && is_uploaded_file($_FILES['file']['tmp_name'])
            && $this->validate($_FILES['file'])){

            move_uploaded_file($_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']);

            $user = $this->userRepository->findById($_SESSION['logged_in_user_id']);
            $user->setId($_SESSION['logged_in_user_id']);
            $address = new Address($_POST['street'],$_POST['city'],$_POST['postal-code'],$_POST['building-number']);
            $farm = new Farm($_POST['name'], $_FILES['file']['name'],1234,$address);
            $farm->setOwner($user);
            $this->farmRepository->createFarm($farm);

            return $this->render('farmsList', ['farms' => $this->farmRepository->getFarms()
                ,'messages' => $this->messages]);
        }


        $this->render('createFarm', ['messages' => $this->messages]);
    }

    private function validate(array $file) : bool {
        //var_dump($file);
        if ($file['size'] > self::MAX_FILE_SIZE){
            $this->messages[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)){
            $this->messages[] = 'File type is not supported';
            return false;
        }

        return true;
    }


    public function farmsList(){
        $farms = $this->farmRepository->getFarms();

        $this->render('farmsList', ['farms' => $farms]);
    }


}