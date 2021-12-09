<?php

require_once 'AppController.php';

class ProfileController extends AppController
{
    public function account(){
        $this->render("account");
    }

    public function settings(){
        $this->render("settings");
    }

    public function profileOverview(){
        $this->render("profileOverview");
    }

}