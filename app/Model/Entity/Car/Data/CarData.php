<?php

namespace App\Model\Entity\Car\Data;

use App\Model\Data\DataBase;
use App\Model\Entity\Car\Car;
use PDO;

final class CarData extends Car
{
    private const DB_NAME = 'car';

    public function insert(array $data)
    {
        $data['status'] = $this->status;
        return (new DataBase(self::DB_NAME))->insert($data);
    }

    public function select($id = null)
    {
        return (new DataBase(self::DB_NAME))->select($id)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $id  = 'id = ' . $id;
        return (new DataBase(self::DB_NAME))->delete($id);
    }

    public function update($data, $id)
    {
        $id  = 'id = ' . $id;
        return (new DataBase(self::DB_NAME))->update($data, $id);
    }
}
