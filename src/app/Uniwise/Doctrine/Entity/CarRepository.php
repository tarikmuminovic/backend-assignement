<?php
declare(strict_types=1);

namespace Uniwise\Doctrine\Entity;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Query;
use Uniwise\Doctrine\Query\GetCarsParams;

class CarRepository extends ServiceEntityRepository
{
    /**
     * @var array|string[]
     */
    private $fields;

    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
        $this->fields = $this->getEntityFields(Car::class);
    }

    /**
     * @param GetCarsParams $params
     * @return array|Car[]
     */
    public function getAll(GetCarsParams $params): array
    {
        $dql = "SELECT c FROM Uniwise\Doctrine\Entity\Car c ";
        $dql .= $this->createFiltersForGetAll($params);
        $dql .= $this->createSort($params);

        $query = $this->_em->createQuery($dql);
        $this->setFiltersForGetAll($query, $params);
        $query->setMaxResults($params->getLimit());
        $query->setFirstResult($params->getOffset());

        return $query->execute();
    }

    /**
     * @param GetCarsParams $params
     * @return string
     */
    private function createFiltersForGetAll(GetCarsParams $params): string
    {
        $dql = " WHERE 1=1 ";

        if ($params->hasBrands()) {
            $dql .= " AND c.brand IN (:brands)";
        }
        if ($params->hasModels()) {
            $dql .= " AND c.model IN (:models)";
        }
        if ($params->hasColors()) {
            $dql .= " AND c.color IN (:colors)";
        }
        if ($params->hasMinGasEconomy()) {
            $dql .= " AND c.gasEconomy >= :minGasEconomy";
        }
        if ($params->hasMaxGasEconomy()) {
            $dql .= " AND c.gasEconomy <= :maxGasEconomy";
        }

        return $dql;
    }

    /**
     * @param Query $query
     * @param GetCarsParams $params
     */
    private function setFiltersForGetAll(Query $query, GetCarsParams $params): void
    {
        if ($params->hasBrands()) {
            $query->setParameter("brands", $params->getBrands());
        }
        if ($params->hasModels()) {
            $query->setParameter("models", $params->getModels());
        }
        if ($params->hasColors()) {
            $query->setParameter("colors", $params->getColors());
        }
        if ($params->hasMinGasEconomy()) {
            $query->setParameter("minGasEconomy", $params->getMinGasEconomy(), Type::FLOAT);
        }
        if ($params->hasMaxGasEconomy()) {
            $query->setParameter("maxGasEconomy", $params->getMaxGasEconomy(), Type::FLOAT);
        }
    }

    /**
     * @param GetCarsParams $params
     * @return string
     */
    private function createSort(GetCarsParams $params): string
    {
        $dql = "";
        if (
            $params->hasSortBy() &&
            isset($this->fields[$params->getSortBy()])
        ) {
            $sortBySafe = $this->fields[$params->getSortBy()];
            $dql .= " ORDER BY c." . $sortBySafe . " ";
            if ($params->hasSortType()) {
                $dql .= " " . $params->getSortType()->getValue();
            }
        }
        return $dql;
    }

    private function getEntityFields(string $entityClass): array
    {
        $reflectionProps = $this->_em->getClassMetadata($entityClass)->getReflectionProperties();
        return array_map(function ($property) {
            return $property->getName();
        }, $reflectionProps);
    }
}