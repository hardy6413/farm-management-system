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

}