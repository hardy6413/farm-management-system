<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/FieldAction.php';
class FieldActionRepository extends Repository
{

    public function addFieldAction($fieldId, $logged_in_personal_data_id, $params, $actionName)
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO field_action (field_id, personal_data_id,description,action_name)
            VALUES  (?, ?, ?, ?) returning id
        ');
        $stmt->execute([
            $fieldId,
            $logged_in_personal_data_id,
            $_POST['description'],
            $actionName,
        ]);

        $fieldActionId = $stmt->fetchColumn();


        foreach($params as $param) {
            $stmt = $this->database->connect()->prepare('
            INSERT INTO param_value (value, field_action_id, param_name)
            VALUES  (?, ?, ?)
        ');
            $stmt->execute([
                $param->getValue(),
                $fieldActionId,
                $param->getParamName()
            ]);
        }

    }
}