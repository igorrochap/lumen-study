<?php

namespace App\Http\Controllers;

use App\Models\Episode;

class EpisodeController extends BaseController
{
    public function __construct()
    {
        $this->model = Episode::class;
    }
}
