<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class EpisodeController extends BaseController
{
    public function __construct()
    {
        $this->model = Episode::class;
    }

    public function getBySeries(int $seriesId): LengthAwarePaginator
    {
        return Episode::query()
            ->where('series_id', $seriesId)
            ->paginate(10);
    }
}
