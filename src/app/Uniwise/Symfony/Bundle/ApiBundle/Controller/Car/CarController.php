<?php
declare(strict_types=1);

namespace Uniwise\Symfony\Bundle\ApiBundle\Controller\Car;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Uniwise\Symfony\Bundle\ApiBundle\Request\GetCarsRequest;
use Uniwise\Symfony\Service\CarService;

/**
 * @Route("/cars")
 */
class CarController extends FOSRestController
{

    /**
     * @var CarService
     */
    private $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    /**
     * @param Request $request
     * @Get("")
     *
     * @return View
     */
    public function getCars(Request $request): View
    {
        $getCarsRequest = new GetCarsRequest($request->query->all());
        $cars = $this->carService->getAll($getCarsRequest);
        return $this->view($cars);
    }
}