<?php

namespace App\Model\Entity\User\Service;

use App\Model\Entity\User\Data\UserData;
use App\Model\Entity\User\User;
use Selective\Validation\Exception\ValidationException;

final class UserCreate extends UserData
{
    private UserData $userData;
    private UserFind $userFind;

    public function __construct(UserData $userData, UserFind  $userFind)
    {
        $this->userData  = $userData;
        $this->userFind  = $userFind;
    }

    public function insert($data)
    {
        $this->checkParams($data);

        $this->checkUserExist($data['email']);

        $data = $this->setParamsToDB($data);

        return $this->userData->insert($data);
    }

    private function checkParams($data)
    {
        $check =  array_filter($data, function ($value) {
            return strlen($value);
        });

        if (count($check) != 3) {
            throw new ValidationException('Dados não foram preenchidos');
        }
    }


    private function checkUserExist($email)
    {
        $email = "email = '$email'";
        $check = $this->userFind->findEmail($email);
        if ($check instanceof User) {
            throw new ValidationException('Email já cadastrado');
        }
    }

    private function setParamsToDb($data)
    {
        return [
            'name' => filter_var($data['name'], FILTER_SANITIZE_STRING),
            'email' => filter_var($data['email'], FILTER_SANITIZE_STRING),
            'pass' => $this->hashPass($data['pass'])
        ];
    }


    private function hashPass($data)
    {
        return password_hash($data, PASSWORD_BCRYPT);
    }
}
