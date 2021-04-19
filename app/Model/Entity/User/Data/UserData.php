<?php

namespace App\Model\Entity\User\Data;

use App\Model\Data\DataBase;
use App\Model\Entity\User\User;
use PDO;

class UserData extends User
{
    private DataBase $userDataBase;
    private const DB_NAME = 'user';

    public function __construct(DataBase $dataBase)
    {
        $this->userDataBase = new $dataBase(self::DB_NAME);
    }

    public function insert(array $data)
    {
        return $this->userDataBase->insert($data);
    }

    public function select($email = null)
    {
        return $this->userDataBase->select($email)->fetchObject(parent::class);
    }

    public function delete($id)
    {
        $id  = 'id = ' . $id;
        return $this->userDataBase->delete($id);
    }

    public function update($data, $id)
    {
        $id  = 'id = ' . $id;
        return $this->userDataBase->update($data, $id);
    }
}
