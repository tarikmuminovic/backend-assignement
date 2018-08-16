<?php

namespace Uniwise\Symfony\Service\Car;

use Uniwise\Doctrine\Entity\CarRepository;

class CarService {

    /**
     * @var CarRepository
     */
    private $carRepository;

    /**
     * CarService constructor.
     * @param CarRepository $carRepository
     */
    public function __construct(CarRepository $carRepository) {
        $this->carRepository = $carRepository;
    }

    public function getCars() {
        return [];
    }
}