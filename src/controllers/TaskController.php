<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/TaskRepository.php';
class TaskController extends AppController
{
    private $taskRepository;

    public function __construct()
    {
        parent::__construct();
        $this->taskRepository = new TaskRepository();
        session_start();
    }

    public function tasks(){
        $tasks = $this->taskRepository->findTasksByFarm();
        $this->render("tasks", ['tasks' => $tasks]);
    }



    public function addTask(){
        $this->render("addTask");
    }

}