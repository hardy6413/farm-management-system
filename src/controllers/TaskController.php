<?php

require_once 'AppController.php';

class TaskController extends AppController
{
    public function tasks(){
        $this->render("tasks");
    }

    public function addTask(){
        $this->render("addTask");
    }

}