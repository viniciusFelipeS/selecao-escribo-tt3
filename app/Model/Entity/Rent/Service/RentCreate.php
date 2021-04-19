<?php

namespace App\Model\Entity\Rent\Service;

use App\Model\Entity\Car\Data\CarData;
use App\Model\Entity\Rent\Data\RentData;
use App\Model\Session\Session;
use Selective\Validation\Exception\ValidationException;

final class RentCreate  extends RentData
{
    private RentData $rentData;
    private CarData $car;


    public function __construct(RentData $rentData, CarData $car)
    {
        $this->rentData  = $rentData;
        $this->car = $car;
    }

    public function create($data, $user)
    {
        $this->checkUserNull($user);

        $data = [
            'id_user' => $user->id,
            'id_car' => $data,
        ];

        $this->rentData->insert($data);

        $dataChange = [
            'status' => '1',
            'rent' => '1'
        ];

        $this->changeStatusCar($dataChange, $data['id_car']);
    }

    private function changeStatusCar($data, $carId)
    {
        $this->car->update($data, $carId);
    }

    private function checkUserNull($user)
    {
        if (!Session::isLogged('user')) {
            throw new ValidationException('signin');
        }
    }
}
