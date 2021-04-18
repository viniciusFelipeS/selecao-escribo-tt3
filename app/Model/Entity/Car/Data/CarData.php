<?php

namespace App\Model\Entity\Car\Data;

use App\Model\Data\DataBase;
use App\Model\Entity\Car\Car;
use PDO;

final class CarData extends Car
{
    private DataBase $CarDataBase;
    private const DB_NAME = 'car';

    public function __construct(DataBase $dataBase)
    {
        $this->CarDataBase = new $dataBase(self::DB_NAME);
    }

    public function insert(array $data)
    {
        $data['status'] = $this->status;
        return $this->CarDataBase->insert($data);
    }

    public function select($id = null)
    {
        return $this->CarDataBase->select($id)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $id  = 'id = ' . $id;
        return $this->CarDataBase->delete($id);
    }

    public function update($data, $id)
    {
        $id  = 'id = ' . $id;
        return $this->CarDataBase->update($data, $id);
    }
}
