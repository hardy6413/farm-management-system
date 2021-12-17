<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/UserAccount.php';

class UserAccountRepository extends Repository
{
    public function getUserAccount(string $email): ?UserAccount{
        session_start();
        $stmt = $this->database->connect()->prepare('
                SELECT * FROM public.user_account WHERE email =:email 
            ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false){
            return null; // nie jest odpowiedni należałoby wyrzucic wyjątek
        }

        $_SESSION['logged_in_user_id'] = $user['id'];
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

}