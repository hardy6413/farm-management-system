<?php

require_once 'Repository.php';
require_once __DIR__.'../models/UserAccount.php'; // to sprawdzi c bo chyba blad w filmiku

class UserAccountRepository extends Repository
{
    public function getUserAccount(string $email): ?UserAccount{
        $stmt = $this->database->connect()->prepare('SELECT * FROM public.users WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false){
            return null; // nie jest odpowiedni należałoby wyrzucic wyjątek
        }

        return new UserAccount($user['email']); // te pola to do  zrobienia
    }

}