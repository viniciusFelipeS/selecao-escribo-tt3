<?php

namespace App\Model\Entity\Rent\Data;

use App\Model\Data\DataBase;
use App\Model\Entity\Rent\Rent;
use PDO;

class RentData extends Rent
{
    private DataBase $RentDataBase;
    private const DB_NAME = 'rent';


    public function __construct(DataBase $dataBase)
    {
        $this->RentDataBase = new $dataBase(self::DB_NAME);
    }

    public function insert($data)
    {
        $data['status'] = $this->status;
        return $this->RentDataBase->insert($data);
    }

    public function select($id = null)
    {
        return $this->RentDataBase->select($id)->fetchAll(PDO::FETCH_CLASS, parent::class);
    }
}
