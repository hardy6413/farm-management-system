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
    }

    public function tasks(){
        $tasks = $this->taskRepository->findTasksByFarm();
        $this->render("tasks", ['tasks' => $tasks, 'messages' => $this->messages]);
    }




    public function addTask(){
        if ($this ->isPost() && isset($_POST['description'])){
            if ($this->checkIfInputIsEmpty($this->messages)){
                $task = new Task($_POST['description'],false,null,null);
                $this->taskRepository->addTask($task,$_SESSION['logged_in_user_farm_id'],
                    $_SESSION['logged_in_personal_data_id']);
                return $this->tasks();
            }else{
                return $this->render("addTask", ['messages' => $this->messages]);
            }
        }else{
            return $this->render("addTask", ['messages' => $this->messages]);
        }
    }

}