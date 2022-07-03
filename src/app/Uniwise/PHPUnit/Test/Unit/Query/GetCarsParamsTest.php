<?php
declare(strict_types=1);

namespace Uniwise\Doctrine\Query;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class GetCarsParamsTest extends TestCase
{
    /**
     * @test
     */
    public function testSettingLimitAboveAllowed_throwsInvalidArgumentException(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $queryParams = new GetCarsParams();
        $queryParams->setLimit(GetCarsParams::MAX_ALLOWED_LIMIT + 1);
    }

    /**
     * @test
     */
    public function testSettingLimitInRangeOfAllowed_queryParamsHaveThatLimitSet(): void
    {
        $validLimit = GetCarsParams::MAX_ALLOWED_LIMIT - 1;

        $queryParams = new GetCarsParams();
        $queryParams->setLimit($validLimit);

        $this->assertEquals($validLimit, $queryParams->getLimit());
    }
}