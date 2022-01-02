<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/PersonalData.php';
class PersonalDataRepository extends Repository
{
    public function findByUserAccountId(int $id): ?PersonalData{
        $stmt = $this->database->connect()->prepare('
                SELECT pd.id, pd.first_name, pd.last_name, pd.is_owner, ad.street, ad.city, ad.postal_code, ad.building_number
                from personal_data pd, address ad, user_account ac
                WHERE pd.address_id = ad.id and pd.id=ac.personal_data_id and ac.id=:id
            ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false){
            return null; //todo nie jest odpowiedni należałoby wyrzucic wyjątek
        }

        $_SESSION['logged_in_personal_data_id'] = $user['id'];
        return new PersonalData($user['first_name'], $user['last_name'],
            new Address($user['street'], $user['city'], $user['postal_code'], $user['building_number'])
             ,$user['is_owner']);
    }

    public function findWorkersByFarm(){
        if (!isset($_SESSION['logged_in_user_farm_id'])){
            return null;
        }else{
            $stmt = $this->database->connect()->prepare('
                SELECT pd.first_name, pd.last_name, pd.is_owner, a.street, a.city, a.postal_code, a.building_number
                FROM personal_data pd, farm fa, address a
                WHERE pd.farm_id = fa.id and fa.id =:id and a.id = pd.address_id
            ');
            $stmt->bindParam(':id', $_SESSION['logged_in_user_farm_id'], PDO::PARAM_INT);
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
    }

    public function createAccount(Address $address, PersonalData $personalData, UserAccount $newUserAccount)
    {
        $stmt = $this->database->connect()->prepare('
        WITH identity AS (INSERT INTO address (street, city, postal_code, building_number)
        VALUES (?, ?, ?, ?) returning id) 
        INSERT INTO personal_data (first_name, last_name, address_id)
        VALUES  (?, ?,(SELECT id from identity)) returning id
        ');
        $stmt->execute([
            $address->getStreet(),
            $address->getCity(),
            $address->getPostalCode(),
            $address->getBuildingNumber(),
            $personalData->getFirstName(),
            $personalData->getLastName(),
        ]);
        $personalDataId = $stmt->fetchColumn();

        $userAccountInsert = $this->database->connect()->prepare('
        INSERT INTO user_account (email, password, personal_data_id)
        VALUES (?,?,?)
        ');
        $userAccountInsert->execute([
            $newUserAccount->getEmail(),
            $newUserAccount->getPassword(),
            $personalDataId
        ]);
    }

    public function joinFarm($farmId,$personalDataId)
    {
        $updateOwner = $this->database->connect()->prepare('
        UPDATE personal_data
        SET farm_id =:f_id , is_owner = false 
        WHERE id =:u_id
        ');
        $updateOwner->bindParam(':f_id', $farmId, PDO::PARAM_INT);
        $updateOwner->bindParam(':u_id', $personalDataId, PDO::PARAM_INT);
        $updateOwner->execute();
    }

}