<?php

namespace Unit;

use App\Http\Controllers\SeriesController;

class SerieTest extends \TestCase
{
    public function testSeriesShouldBeEmpty()
    {
        $mock = $this->createMock(SeriesController::class);
        $mock->method('index')->willReturn([]);
        $seriesAmount = $mock->index();
        self::assertCount(0, $seriesAmount);
    }
}
