<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Farm.php';
require_once __DIR__.'/../repository/UserAccountRepository.php';
require_once __DIR__.'/../models/PersonalData.php';
require_once __DIR__.'/../models/Field.php';

class FarmRepository extends Repository
{
    public function getFarm(int $id): ?Farm
    {
        $stmt = $this->database->connect()->prepare('
                SELECT * FROM public.farm WHERE id =:id //todo czy z selecta usera  jakos wziąć?
            ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $project = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($project == false) {
            return null; // nie jest odpowiedni należałoby wyrzucic wyjątek
        }

        return new Farm($project['name'], $project['address'], $project['image']); //todo tutaj do rpzeorbienia
    }

    public function createFarm(Farm $farm): void
    {

        $stmt = $this->database->connect()->prepare('
        WITH identity AS (INSERT INTO address (street, city, postal_code, building_number)
        VALUES (?, ?, ?, ?) returning id)
        INSERT INTO farm (name ,token, image, address_id)
        VALUES  (?, ?, ?, (SELECT id from identity))
        ');

        $stmt->execute([
            $farm->getFarmAddress()->getStreet(),
            $farm->getFarmAddress()->getCity(),
            $farm->getFarmAddress()->getPostalCode(),
            $farm->getFarmAddress()->getBuildingNumber(),
            $farm->getName(),
            $farm->getToken(),
            $farm->getImage(),
        ]);
    }

    public function getFarms()
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            select  f.id,f.name, f.image, f.token, a.street, a.city, a.postal_code, a.building_number
            from farm f, address a
            where f.address_id = a.id
        ');
        $stmt->execute();
        $farms = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($farms as $farm) {
            $foundFields = $this->findFieldsByFarm($farm);
            $foundWorkers = $this->findWorkersByFarm($farm);

            $queriedFarm = new Farm(
                $farm['name'],
                $farm['image'],
                $farm['token'],
                new Address($farm['street'], $farm['city'], $farm['postal_code'], $farm['building_number']),
                $foundFields,
                $foundWorkers
            );
             $result[] = $queriedFarm;

        }
        return $result;
        }

    /**
     * @param $farm
     * @return array
     */
    public function findFieldsByFarm($farm): array
    {
        $stmt = $this->database->connect()->prepare('
                SELECT * FROM field f, farm fa
                WHERE f.farm_id = fa.id and fa.id=:id
            ');
        $stmt->bindParam(':id', $farm['id'], PDO::PARAM_INT);
        $stmt->execute();
        $fields = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $foundFields = [];
        foreach ($fields as $field) {
            $foundFields[] = new Field($field['name'], $field['description'], $field['area'], $field['extra_payment'],
                $field['block_number'], $field['is_property']);
        }
        return $foundFields;
    }

    private function findWorkersByFarm($farm): array
    {
        $stmt = $this->database->connect()->prepare('
                SELECT * FROM personal_data pd, farm fa, address a
                WHERE pd.farm_id = fa.id and fa.id =:id and a.id = pd.address_id
            ');
        $stmt->bindParam(':id', $farm['id'], PDO::PARAM_INT);
        $stmt->execute();
        $workers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $foundWorkers=[];
        foreach ($workers as $worker) {
            $foundWorkers[] = new PersonalData($worker['first_name'],$worker['last_name'],
                new Address($worker['street'], $worker['city'], $worker['postal_code'], $worker['building_number'])
                ,$worker['is_owner']);
        }

        return $foundWorkers;

    }

}
