<?php

namespace App\Model\Entity\Rent\Data;

use App\Model\Data\DataBase;
use App\Model\Entity\Car\Data\CarData;
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

    public  function insert($data)
    {
        $data['status'] = $this->status;
        return $this->RentDataBase->insert($data);
    }

    public static function select($id = null)
    {
        $id = 'rent.id_car = car.id and rent.id_user = '.$id;
        $field = "rent.id, rent.id_car ,rent.status, rent.date , car.model 'carmodel', car.year 'caryear', car.price 'carprice'";
        return (new DataBase('rent'))->select(null,'id DESC',null,$field,'car', $id)->fetchAll(PDO::FETCH_CLASS, parent::class);
    }

    public function update($id){
        $id = explode(",", $id['id']);
        $data = [
            'status' => '0'
        ];
        $idrent = 'id = '.$id[0];
        $this->RentDataBase->update($data,$idrent);
        $idcar =  'id = '.$id[1];
        (new DataBase('car'))->update($data, $idcar);
        return true;

    }
}
