<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/UserAccount.php';

class UserAccountRepository extends Repository
{
    public function logIn(string $email): ?UserAccount{
        $stmt = $this->database->connect()->prepare('
                SELECT ua.id, ua.email, ua.password, ua.personal_data_id, pd.farm_id
                FROM  public.user_account ua
                inner join personal_data pd on pd.id = ua.personal_data_id
                where ua.email=:email
            ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false){
            return null; // nie jest odpowiedni należałoby wyrzucic wyjątek
        }

        $_SESSION['logged_in_user_account_id'] = $user['id'];
        if (($user['farm_id']) != null){
            $_SESSION['logged_in_user_farm_id'] = $user['farm_id'];
        }
        $_SESSION['logged_in_personal_data_id'] = $user['personal_data_id'];
        return new UserAccount($user['email'],$user['password']);
    }

    public function findById(int $id): ?UserAccount{
        $stmt = $this->database->connect()->prepare('
                SELECT * FROM public.user_account WHERE id =:id 
            ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false){
            return null; // nie jest odpowiedni należałoby wyrzucic wyjątek
        }

        return new UserAccount($user['email'],$user['password']);
    }

    public function getUserAccount(string $email): ?UserAccount{
        $stmt = $this->database->connect()->prepare('
                SELECT ua.id, ua.email, ua.password, ua.personal_data_id, pd.farm_id
                FROM  public.user_account ua
                inner join personal_data pd on pd.id = ua.personal_data_id
                where ua.email=:email
            ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false){
            return null;
        }
        return new UserAccount($user['email'],$user['password']);
    }

}