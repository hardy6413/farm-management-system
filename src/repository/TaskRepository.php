<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Task.php';
require_once __DIR__.'/../models/PersonalData.php';

class TaskRepository extends Repository
{
    public function findTasksByFarm(){
        if (!isset($_SESSION['logged_in_user_farm_id'])){
            return null;
        }else {
            $stmt = $this->database->connect()->prepare('
                SELECT t.description, t.is_completed, t.created_at, pd.first_name, pd.last_name
                FROM task t, farm fa, personal_data pd
                WHERE t.farm_id = fa.id and fa.id=:id and t.personal_data_id = pd.id
            ');
            $stmt->bindParam(':id', $_SESSION['logged_in_user_farm_id'], PDO::PARAM_INT);
            $stmt->execute();
            $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $foundTasks = [];
            foreach ($tasks as $task) {
                $foundTasks[] = new Task($task['description'], $task['is_completed'], $task['created_at'],
                    new PersonalData($task[['first_name']],$task['last_name'],null,null));
            }
            return $foundTasks;
        }//todo wytestowac
    }

}