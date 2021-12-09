<?php

require_once 'AppController.php';

class WorkersController extends AppController
{
    public function workers(){
        $this->render("workers");
    }

}