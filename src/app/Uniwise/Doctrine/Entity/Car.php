<?php
declare(strict_types=1);

namespace Uniwise\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="CarRepository")
 * @ORM\Table(name="car")
 */
class Car
{
    use Identifiable;

    /**
     * @ORM\Column(name="brand", type="string", length=255, nullable=false)
     * @var string
     */
    private $brand;

    /**
     * @ORM\Column(name="model", type="string", length=255, nullable=false)
     * @var string
     */
    private $model;

    /**
     * @ORM\Column(name="color", type="string", length=100, nullable=false)
     * @var string
     */
    private $color;

    /**
     * @ORM\Column(name="gas_economy", type="float", nullable=false)
     * @var float
     */
    private $gasEconomy; // in MPG

    /**
     * @ORM\Column(name="extra_accessories", type="json", columnDefinition="json default '{}'")
     * @var array
     */
    private $extraAccessories;
}