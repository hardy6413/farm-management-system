<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Field.php';
require_once __DIR__.'/../models/ActionParam.php';

class FieldRepository extends Repository
{
    public function findFieldsByFarm(): ?array
    {
            $stmt = $this->database->connect()->prepare('
                SELECT f.id, f.name, f.description, f.area, f.extra_payment, f.block_number, f.is_property, f.image
                FROM field f
                inner join farm fa on fa.id = f.farm_id
                WHERE fa.id=:id
            ');
            $stmt->bindParam(':id', $_SESSION['logged_in_user_farm_id'], PDO::PARAM_INT);
            $stmt->execute();
            $fields = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $foundFields = [];
            foreach ($fields as $field) {
                $foundFields[] = new Field($field['name'], $field['description'], $field['area'], $field['extra_payment'],
                    $field['block_number'], $field['is_property'], $field['image'],$this->findFieldActionsByFieldId($field['id'])
                    , $field['id']);
            }
            return $foundFields;
    }


    public function createField(Field $field, $logged_in_user_farm_id)
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO field (name ,description, area, extra_payment, block_number, is_property, farm_id, image)
        VALUES  (?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $property = true;
        if ($field->getIsProperty() === false){
            $property = 'false';
        }

        $stmt->execute([
            $field->getName(),
            $field->getDescription(),
            $field->getArea(),
            $field->getExtraPayment(),
            $field->getBlockNumber(),
            $property,
            $logged_in_user_farm_id,
            $field->getImage()
        ]);

    }

    public function findFieldById($id): ?Field
    {
        $stmt = $this->database->connect()->prepare('
                SELECT f.name, f.description, f.area, f.extra_payment, f.block_number, f.is_property, f.image
                FROM field f
                WHERE f.id=:id
            ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $field = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($field === false){
            return null;
        }

        return new Field($field['name'], $field['description'], $field['area'], $field['extra_payment'],
                $field['block_number'], $field['is_property'], $field['image'],$this->findFieldActionsByFieldId($id), $id);
    }

    public function findFieldActionsByFieldId($id): ?array
    {
        $stmt = $this->database->connect()->prepare('
                SELECT fa.id, fa.is_completed, fa.created_at, fa.description, fa.action_name, fa.is_completed,
                pd.first_name, pd.last_name, pd.is_owner, ad.street, ad.city, ad.postal_code, ad.building_number
                FROM field_action fa
                inner join personal_data pd on pd.id = fa.personal_data_id
                inner join address ad on ad.id = pd.address_id
                WHERE fa.field_id=:id
            ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $fieldActions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($fieldActions === false){
            return null;
        }

        $foundFieldActions = [];

        $fieldActionRepository  = new FieldActionRepository();


        if (!empty($fieldActions)){
            foreach ($fieldActions as $fieldAction) {
                $fieldAction['created_at'] = date('d-m-Y', strtotime($fieldAction['created_at']));
                $actionParams = $fieldActionRepository->findActionParamsByFieldActionId($fieldAction['id']);
                $foundFieldActions[] = new FieldAction(
                    $fieldAction['id'],
                    new PersonalData($fieldAction['first_name'], $fieldAction['last_name'],
                        new Address($fieldAction['street'],$fieldAction['city'], $fieldAction['postal_code'],
                            $fieldAction['building_number']),$fieldAction['is_owner']),
                    $fieldAction['created_at'], $fieldAction['description'], $fieldAction['action_name'],
                    $actionParams,$fieldAction['is_completed']
                );
            }
        }
        return $foundFieldActions;

    }


    public function getFarmsFieldsByName(string $searchString){
        if (isset($_SESSION['logged_in_user_farm_id'])){
            $searchString = '%'.strtolower($searchString).'%';

            $stmt = $this->database->connect()->prepare('
            SELECT f.id, f.name, f.area, f.block_number, f.is_property, f.extra_payment, f.image, f.description
            FROM field f
            WHERE LOWER(f.name) LIKE :search and f.farm_id =:id
        ');
            $stmt->bindParam(':search', $searchString,PDO::PARAM_STR);
            $stmt->bindParam(':id', $_SESSION['logged_in_user_farm_id'],PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return null;
        }

    }



}