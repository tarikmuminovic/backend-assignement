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

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMake() {
        return $this->make;
    }

    /**
     * @param string $make
     * @return Car
     */
    public function setMake($make) {
        $this->make = $make;
        return $this;
    }

    /**
     * @return string
     */
    public function getModel() {
        return $this->model;
    }

    /**
     * @param string $model
     * @return Car
     */
    public function setModel($model) {
        $this->model = $model;
        return $this;
    }

    /**
     * @return string
     */
    public function getFuel() {
        return $this->fuel;
    }

    /**
     * @param string $fuel
     * @return Car
     */
    public function setFuel($fuel) {
        $this->fuel = $fuel;
        return $this;
    }

    /**
     * @return string
     */
    public function getColor() {
        return $this->color;
    }

    /**
     * @param string $color
     * @return Car
     */
    public function setColor($color) {
        $this->color = $color;
        return $this;
    }
}