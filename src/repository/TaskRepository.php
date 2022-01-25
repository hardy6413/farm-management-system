<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Task.php';
require_once __DIR__.'/../models/PersonalData.php';

class TaskRepository extends Repository
{
    public function findTasksByFarm(): ?array
    {
        if (!isset($_SESSION['logged_in_user_farm_id'])){
            return null;
        }else {
            $stmt = $this->database->connect()->prepare('
                SELECT t.description, t.is_completed, t.created_at, t.farm_id, t.personal_data_id, pd.first_name, pd.last_name
                FROM public.task t
                INNER JOIN farm fa on fa.id = t.farm_id
                INNER JOIN personal_data pd on pd.id = t.personal_data_id
                WHERE fa.id=:id
            ');
            $stmt->bindParam(':id', $_SESSION['logged_in_user_farm_id'], PDO::PARAM_INT);
            $stmt->execute();
            $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $foundTasks = [];
            foreach ($tasks as $task) {
                $foundTasks[] = new Task($task['description'], $task['is_completed'], $task['created_at'],
                    new PersonalData($task['first_name'],$task['last_name'],null,null));
            }
            return $foundTasks;
        }
    }

    public function addTask(Task $task, $logged_in_user_farm_id, $logged_in_personal_data_id)
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO task (description, is_completed, farm_id, personal_data_id)
        VALUES  (?, ?, ?, ?)
        ');


        $stmt->execute([
            $task->getDescription(),
            'false',
            $logged_in_user_farm_id,
            $logged_in_personal_data_id
        ]);

    }

}