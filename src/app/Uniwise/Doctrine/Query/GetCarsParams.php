<?php
declare(strict_types=1);

namespace Uniwise\Doctrine\Query;

use InvalidArgumentException;

class GetCarsParams
{
    public const MAX_ALLOWED_LIMIT = 100;
    public const DEFAULT_LIMIT = 20;

    /**
     * @var array|string[]
     */
    private $brands = [];

    /**
     * @var array|string[]
     */
    private $models = [];

    /**
     * @var array|string[]
     */
    private $colors = [];

    /**
     * @var float|null
     */
    private $minGasEconomy;

    /**
     * @var float|null
     */
    private $maxGasEconomy;

    /**
     * @var string|null
     */
    private $sortBy;

    /**
     * @var SortType|null
     */
    private $sortType;

    /**
     * @var int
     */
    private $limit = self::DEFAULT_LIMIT;

    /**
     * @var int
     */
    private $offset = 0;

    /**
     * @return array|string[]
     */
    public function getBrands(): array
    {
        return $this->brands;
    }

    /**
     * @return array|string[]
     */
    public function getModels(): array
    {
        return $this->models;
    }

    /**
     * @return array|string[]
     */
    public function getColors(): array
    {
        return $this->colors;
    }

    /**
     * @return float|null
     */
    public function getMinGasEconomy(): ?float
    {
        return $this->minGasEconomy;
    }

    /**
     * @return float|null
     */
    public function getMaxGasEconomy(): ?float
    {
        return $this->maxGasEconomy;
    }

    /**
     * @return string|null
     */
    public function getSortBy(): ?string
    {
        return $this->sortBy;
    }

    /**
     * @return SortType|null
     */
    public function getSortType(): ?SortType
    {
        return $this->sortType;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param string[]|null $brands
     * @return GetCarsParams
     */
    public function setBrandsFilter(?array $brands): GetCarsParams
    {
        $this->brands = $brands ?? [];
        return $this;
    }

    /**
     * @param string[]|null $models
     * @return GetCarsParams
     */
    public function setModelsFilter(?array $models): GetCarsParams
    {
        $this->models = $models ?? [];
        return $this;
    }

    /**
     * @param string[]|null $colors
     * @return GetCarsParams
     */
    public function setColorsFilter(?array $colors): GetCarsParams
    {
        $this->colors = $colors ?? [];
        return $this;
    }

    /**
     * @param float|null $minGasEconomy
     * @param float|null $maxGasEconomy
     * @return GetCarsParams
     */
    public function setGasEconomyFilter(
        ?float $minGasEconomy,
        ?float $maxGasEconomy
    ): GetCarsParams
    {
        $this->minGasEconomy = $minGasEconomy;
        $this->maxGasEconomy = $maxGasEconomy;
        return $this;
    }

    /**
     * @param string|null $sortBy
     * @param string|null $sortType
     * @return GetCarsParams
     */
    public function setSort(?string $sortBy, ?string $sortType): GetCarsParams
    {
        if (!is_null($sortBy)) {
            $this->sortBy = $sortBy;
            $this->sortType = SortType::has($sortType) ? SortType::byValue($sortType) : null;
        }
        return $this;
    }

    /**
     * @param int|null $limit
     * @return GetCarsParams
     */
    public function setLimit(?int $limit): GetCarsParams
    {
        if ($limit > self::MAX_ALLOWED_LIMIT) {
            throw new InvalidArgumentException("Limit cannot be greater than " . self::MAX_ALLOWED_LIMIT);
        }
        $this->limit = $limit ?? self::DEFAULT_LIMIT;
        return $this;
    }

    /**
     * @param int|null $offset
     * @return GetCarsParams
     */
    public function setOffset(?int $offset): GetCarsParams
    {
        $this->offset = $offset ?? 0;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasBrands(): bool
    {
        return !empty($this->brands);
    }

    /**
     * @return bool
     */
    public function hasModels(): bool
    {
        return !empty($this->models);
    }

    /**
     * @return bool
     */
    public function hasColors(): bool
    {
        return !empty($this->colors);
    }

    /**
     * @return bool
     */
    public function hasMinGasEconomy(): bool
    {
        return $this->minGasEconomy !== null;
    }

    /**
     * @return bool
     */
    public function hasMaxGasEconomy(): bool
    {
        return $this->maxGasEconomy !== null;
    }

    /**
     * @return bool
     */
    public function hasSortBy(): bool
    {
        return !empty($this->sortBy);
    }

    /**
     * @return bool
     */
    public function hasSortType(): bool
    {
        return !empty($this->sortType);
    }
}