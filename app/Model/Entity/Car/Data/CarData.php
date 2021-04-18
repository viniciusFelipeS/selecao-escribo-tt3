<?php

namespace App\Model\Entity\Car\Data;

use App\Model\Data\DataBase;
use PDO;

final class CarData
{
    public static function insert(array $data)
    {
        $data['status'] = 0;
        return (new DataBase('car'))->insert($data);
    }

    public static function select($id = null)
    {
        return (new DataBase('car'))->select($id)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete($id = null)
    {
        return (new DataBase('car'))->delete($id);
    }
}
