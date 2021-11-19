<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index(){
        //TODO Display login.html
        $this->render('login');
    }

    public function farms(){
        //TODO display farms.html
        $this->render('farms');
    }
}