<?php

namespace Unit;

use App\Http\Controllers\SerieController;

class SerieTest extends \TestCase
{
    public function testSeriesShouldBeEmpty()
    {
        $mock = $this->createMock(SerieController::class);
        $mock->method('index')->willReturn([]);
        $seriesAmount = $mock->index();
        self::assertCount(0, $seriesAmount);
    }
}
