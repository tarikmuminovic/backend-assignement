<?php
declare(strict_types=1);

namespace Uniwise\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

trait Identifiable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     */
    private $id;
}