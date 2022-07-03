<?php
declare(strict_types=1);

namespace Uniwise\Doctrine\Query;

use MabeEnum\Enum;

class SortType extends Enum
{
    const ASC = "ASC";
    const DESC = "DESC";
}