<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Address.php';
require_once __DIR__ .'/../models/Farm.php';

class FarmController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    private $messages = [];

    public function createFarm(){
        if ($this ->isPost() && is_uploaded_file($_FILES['file']['tmp_name'])
            && $this->validate($_FILES['file'])){

            move_uploaded_file($_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']);

            $address = new Address($_POST['street'],$_POST['city'],$_POST['postal-code'],$_POST['building-number']);
            $farm = new Farm($_POST['name'],new UserAccount('test','test'),$address,
                '1234', $_FILES['file']['name']);

            return $this->render('farmsList', ['messages' => $this->messages, 'farm' => $farm]);
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
}