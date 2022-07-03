<?php
declare(strict_types=1);

namespace Uniwise\Symfony\Service;

use Uniwise\Doctrine\Entity\Car;
use Uniwise\Doctrine\Entity\CarRepository;
use Uniwise\Doctrine\Query\GetCarsParams;
use Uniwise\Symfony\Bundle\ApiBundle\Request\GetCarsRequest;

class CarService
{

    /**
     * @var CarRepository
     */
    private $carRepository;

    /**
     * @param CarRepository $carRepository
     */
    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    /**
     * Method returns all cars matching filters if sent
     *
     * @param GetCarsRequest $queryRequest
     * @return array|Car[]
     */
    public function getAll(GetCarsRequest $queryRequest): array
    {
        $queryParams = $this->createGetAllParams($queryRequest);
        return $this->carRepository->getAll($queryParams);
    }

    /**
     * Defines parameters to query all cars with optional filtering and sorting
     *
     * @param GetCarsRequest $request
     * @return GetCarsParams
     */
    private function createGetAllParams(GetCarsRequest $request): GetCarsParams
    {
        $brands = $request->brands != null ? explode(",", $request->brands) : [];
        $models = $request->models != null ? explode(",", $request->models) : [];
        $colors = $request->colors != null ? explode(",", $request->colors) : [];

        return (new GetCarsParams())
            ->setBrandsFilter($brands)
            ->setModelsFilter($models)
            ->setColorsFilter($colors)
            ->setGasEconomyFilter($request->minGasEconomy, $request->maxGasEconomy)
            ->setSort($request->sortBy, $request->sortType)
            ->setLimit($request->limit)
            ->setOffset($request->offset);
    }
}