<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class SeriesController extends Controller
{
    public function index(): Collection
    {
        return Series::all();
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json(
            Series::create(["name" => $request->name]),
            201
        );
    }

    public function get(int $id): JsonResponse
    {
        $series = Series::find($id);
        if(is_null($series)) {
            return response()->json('', 204);
        }
        return response()->json($series);
    }
}
