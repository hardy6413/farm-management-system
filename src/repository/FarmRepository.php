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
            select  f.id,f.name, f.image, f.token, a.street, a.city, a.postal_code, a.building_number
            from farm f, address a
            where f.address_id = a.id and f.id =:id
            ');//todo czy z selecta usera  jakos wziąć?
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $farm = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($farm == false) {
            return null; // nie jest odpowiedni należałoby wyrzucic wyjątek
        }
        $foundFields = $this->findFieldsByFarm($farm);
        $foundWorkers = $this->findWorkersByFarmId($farm);

        $foundFarm = new Farm($farm['name'], $farm['image'], $farm['token'],
        new Address($farm['street'],$farm['city'], $farm['postal_code'], $farm['building_number']),
        $foundFields, $foundWorkers);
        $foundFarm->setId($farm['id']);
        return $foundFarm;
    }

    public function createFarm(Farm $farm, int $personalDataId): void
    {
        $stmt = $this->database->connect()->prepare('
        WITH identity AS (INSERT INTO address (street, city, postal_code, building_number)
        VALUES (?, ?, ?, ?) returning id) 
        INSERT INTO farm (name ,token, image, address_id)
        VALUES  (?, ?, ?, (SELECT id from identity)) returning id
        ');//todo returning id? chyba zapomnialem usunac

        $stmt->execute([
            $farm->getFarmAddress()->getStreet(),
            $farm->getFarmAddress()->getCity(),
            $farm->getFarmAddress()->getPostalCode(),
            $farm->getFarmAddress()->getBuildingNumber(),
            $farm->getName(),
            $farm->getToken(),
            $farm->getImage()
        ]);
        $farmId = $stmt->fetchColumn();

        $updateOwner = $this->database->connect()->prepare('
        UPDATE personal_data
        SET farm_id =:f_id , is_owner = true
        WHERE id =:u_id
        ');
        $updateOwner->bindParam(':f_id', $farmId, PDO::PARAM_INT);
        $updateOwner->bindParam(':u_id', $personalDataId, PDO::PARAM_INT);
        $updateOwner->execute();

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
            $foundWorkers = $this->findWorkersByFarmId($farm);

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


    public function getFarmByName(string $searchString){
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this->database->connect()->prepare('
            SELECT f.id, f.name, f.token, f.image, f.address_id, ad.street, ad.city, ad.postal_code, ad.building_number,
            pd.first_name, pd.last_name, pd.is_owner
            FROM farm f, address ad , personal_data pd , address adp 
            WHERE LOWER(f.name) LIKE :search and f.address_id = ad.id and pd.farm_id = f.id and adp.id = pd.address_id 
            and pd.is_owner = true
        ');
        $stmt->bindParam(':search', $searchString,PDO::PARAM_STR);
        $stmt->execute();

        $farm = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $farm;
    }


    private function findFieldsByFarm($farm): array
    {
        $stmt = $this->database->connect()->prepare('
                SELECT f.id, f.name, f.description, f.area, f.extra_payment, f.block_number, f.is_property, f.image
                FROM field f, farm fa
                WHERE f.farm_id = fa.id and fa.id=:id
            ');
        $stmt->bindParam(':id', $farm['id'], PDO::PARAM_INT);
        $stmt->execute();
        $fields = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $fieldRepository = new FieldRepository();
        $foundFields = [];
        foreach ($fields as $field) {
            $foundFields[] = new Field($field['name'], $field['description'], $field['area'], $field['extra_payment'],
                $field['block_number'], $field['is_property'], $field['image'],
                $fieldRepository->findFieldActionsByFieldId($field['id']));
        }
        return $foundFields;
    }

    private function findWorkersByFarmId($farm)
    {
        $stmt = $this->database->connect()->prepare('
                SELECT pd.first_name, pd.last_name, pd.is_owner, a.street, a.city, a.postal_code, a.building_number
                FROM personal_data pd, farm fa, address a
                WHERE pd.farm_id = fa.id and fa.id =:id and a.id = pd.address_id
            ');
        $stmt->bindParam(':id', $farm['id'], PDO::PARAM_INT);
        $stmt->execute();
        $workers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($workers == false){
            return null; //todo nie jest odpowiedni należałoby wyrzucic wyjątek
        }

        $foundWorkers=[];
        foreach ($workers as $worker) {
            $foundWorkers[] = new PersonalData($worker['first_name'],$worker['last_name'],
                new Address($worker['street'], $worker['city'], $worker['postal_code'], $worker['building_number'])
                ,$worker['is_owner']);
        }
        return $foundWorkers;

    }

    public function getFarmByCode($code)
    {
        $stmt = $this->database->connect()->prepare('
                SELECT * FROM public.farm WHERE token =:id
            ');
        $stmt->bindParam(':id', $code, PDO::PARAM_INT);
        $stmt->execute();

        $farm = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($farm == false) {
            return null; // nie jest odpowiedni należałoby wyrzucic wyjątek
        }
        return $farm['id'];
    }
}
