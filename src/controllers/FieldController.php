<?php

require_once 'AppController.php';

class FieldController extends AppController
{
    public function fields(){
        $this->render('fields');
    }

    public function addField(){
        $this->render('addField');
    }

    public function fieldOverview(){
        $this->render('fieldOverview');
    }
}