<?php

namespace Uniwise\Doctrine\Entity;

use Doctrine\ORM\EntityRepository;

class CarRepository extends EntityRepository {

    /**
     * @return array|Car[]
     */
    public function getAll() {
        return $this->findAll();
    }
}