<?php
namespace Uniwise\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="CarRepository")
 * @ORM\Table(name="car")
 */
class Car {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     * @var string
     */
    private $make;

    /**
     * @ORM\Column(type="string", length=40)
     * @var string
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=20)
     * @var string
     */
    private $fuel;

    /**
     * @ORM\Column(type="string", length=20)
     * @var string
     */
    private $color;
}