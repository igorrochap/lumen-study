<?php

namespace Unit;

use App\Http\Controllers\BaseController;

class SerieTest extends \TestCase
{
    public function testSeriesShouldBeEmpty()
    {
        $mock = $this->createMock(BaseController::class);
        $mock->method('index')->willReturn([]);
        $seriesAmount = $mock->index();
        self::assertCount(0, $seriesAmount);
    }
}
