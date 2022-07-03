<?php
declare(strict_types=1);

namespace Uniwise\Symfony\Bundle\ApiBundle\Request;

class GetCarsRequest
{
    /**
     * @var array|string[]|null
     */
    public $brands;

    /**
     * @var array|string[]|null
     */
    public $models;

    /**
     * @var array|string[]|null
     */
    public $colors;

    /**
     * @var float|null
     */
    public $minGasEconomy;

    /**
     * @var float|null
     */
    public $maxGasEconomy;

    /**
     * @var string|null
     */
    public $sortBy;

    /**
     * @var string|null
     */
    public $sortType;

    /**
     * @var int|null
     */
    public $limit;

    /**
     * @var int|null
     */
    public $offset;

    /**
     * @param array
     */
    public function __construct(array $params)
    {
        $this->brands = $params["brands"] ?? null;
        $this->models = $params["models"] ?? null;
        $this->colors = $params["colors"] ?? null;
        $this->minGasEconomy = isset($params["minGasEconomy"]) ? (float)$params["minGasEconomy"] : null;
        $this->maxGasEconomy = isset($params["maxGasEconomy"]) ? (float)$params["maxGasEconomy"] : null;
        $this->sortBy = $params["sortBy"] ?? null;
        $this->sortType = $params["sortType"] ?? null;
        $this->limit = isset($params["limit"]) ? (int)$params["limit"] : null;
        $this->offset = isset($params["offset"]) ? (int)$params["offset"] : null;
    }
}