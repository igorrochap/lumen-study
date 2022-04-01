<?php

namespace App\Http\Controllers;

class SerieController extends Controller
{
    public function index()
    {
        return [
            "Grey's Anatomy",
            "Lost"
        ];
    }
}
