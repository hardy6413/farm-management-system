<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Field.php';
class FieldRepository extends Repository
{
    public function findFieldsByFarm(){
        if (!isset($_SESSION['logged_in_user_farm_id'])){ //todo o to spytac czy nie lepiej w kontrolerze?
            return null;
        }else {
            $stmt = $this->database->connect()->prepare('
                SELECT f.name, f.description, f.area, f.extra_payment, f.block_number, f.is_property, f.image
                FROM field f, farm fa
                WHERE f.farm_id = fa.id and fa.id=:id
            ');
            $stmt->bindParam(':id', $_SESSION['logged_in_user_farm_id'], PDO::PARAM_INT);
            $stmt->execute();
            $fields = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $foundFields = [];
            foreach ($fields as $field) {
                $foundFields[] = new Field($field['name'], $field['description'], $field['area'], $field['extra_payment'],
                    $field['block_number'], $field['is_property'], $field['image']);
            }
            return $foundFields;
        }

    }

    public function createField(Field $field, $logged_in_user_farm_id)
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO field (name ,description, area, extra_payment, block_number, is_property, farm_id, image)
        VALUES  (?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $property = true;
        if ($field->isProperty() === false){
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


}