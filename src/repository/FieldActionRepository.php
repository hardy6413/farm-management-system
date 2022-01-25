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

    public function fieldDetailedInfo($id): array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT fa.is_completed, fa.created_at, fa.description, fa.action_name, fa.is_completed,
            pd.first_name, pd.last_name, pd.is_owner, ad.street, ad.city, ad.postal_code, ad.building_number
            FROM field_action fa
            inner join personal_data pd on pd.id = fa.personal_data_id
            inner join address ad on ad.id = pd.address_id
            WHERE fa.id=:id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $fieldAction = $stmt->fetch(PDO::FETCH_ASSOC);
        $fieldAction['created_at'] = date('d-m-Y H:i:s', strtotime($fieldAction['created_at']));
        $stmt = $this->database->connect()->prepare('
                SELECT pa.value, pa.param_name
                FROM param_value pa
                inner join field_action fa on fa.id = pa.field_action_id
                WHERE fa.id=:id
            ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $actionParams = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_merge($fieldAction,$actionParams);

    }


    public function findActionParamsByFieldActionId($fieldActionId): ?array
    {
        $stmt = $this->database->connect()->prepare('
                SELECT pa.value, pa.param_name
                FROM param_value pa
                inner join field_action fa on fa.id = pa.field_action_id
                WHERE fa.id=:id
            ');
        $stmt->bindParam(':id', $fieldActionId, PDO::PARAM_INT);
        $stmt->execute();
        $actionParams = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($actionParams === false){
            return null;
        }

        $foundActionParams = [];

        foreach ($actionParams as $actionParam) {
            $foundActionParams[] = new ActionParam($actionParam['param_name'], $actionParam['value']);
        }
        return $foundActionParams;
    }
}