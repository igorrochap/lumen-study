<?php

namespace App\Http\Controllers;

use App\Models\Series;

class SerieController extends Controller
{
    public function index()
    {
        return Series::all();
    }
}
