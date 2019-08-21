<?php

namespace Uniwise\Symfony\Bundle\ApiBundle\Controller\Car;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\FOSRestController;

/**
 * @Route("/car")
 */
class CarController extends FOSRestController {

    /**
     * @Get("")
     */
    public function getCars() {
        return $this->view("Not implemented yet");
    }
}