<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/PersonalData.php';
class PersonalDataRepository
{
    public function findById(int $id): ?PersonalData{
        $stmt = $this->database->connect()->prepare('
                SELECT pd.first_name, pd.last_name, ad.street, ad.city, ad.postal_code, ad.building_number
                , f.name, f.token, f.image, fa.street as farm_address_street, fa.city as farm_address_city
                , fa.postal_code as farm_address_postal_code, fa.building_number as farm_address_building_number,
                owner.first_name, owner.last_name,
                from personal_data pd, address ad, farm f, address fa, personal_data owner
                WHERE pd.address_id = ad.id and pd.farm_id = f.id and f.address_id = fa.id
            ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false){
            return null; // nie jest odpowiedni należałoby wyrzucic wyjątek
        }

        //return new UserAccount($user['email'],$user['password']);
    }

}