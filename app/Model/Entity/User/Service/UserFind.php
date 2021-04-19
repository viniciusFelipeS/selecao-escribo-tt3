<?php

namespace App\Model\Entity\User\Service;

use App\Model\Entity\User\Data\UserData;
use App\Model\Entity\User\User;
use Selective\Validation\Exception\ValidationException;

final class UserFind extends UserData
{

    private UserData $userData;

    public function __construct(UserData $userData)
    {
        $this->userData  = $userData;
    }

    public function findEmail($email)
    {   
        return $this->userData->select($email, null, null, 'email');
    }

    public function find(Array $data): User
    {   
        $this->checkParams($data);

        $user = $this->checkSameData($data);

        return $user;
    }


    private function checkParams($data)
    {
        if (empty($data['email']) || empty($data['pass'])) {
            throw new ValidationException('Dados não foram preenchidos');
        }
    }

    private function checkSameData($data){
        $emailSearch = 'email = "' . $data['email'] . '"';

        $user = $this->userData->select($emailSearch);
        if (!password_verify($data['pass'], $user->pass) || $data['email'] != $user->email){
            throw new ValidationException('Usuário ou senha incorreta!');
        }
        
        $user->pass = '';
        return $user;
    }
}
