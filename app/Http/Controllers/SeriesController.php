<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
            Series::create($request->all()),
            201
        );
    }

    public function show(int $id): JsonResponse
    {
        $series = Series::find($id);
        if(is_null($series)) {
            return response()->json('', 204);
        }
        return response()->json($series);
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $series = Series::find($id);
        if(is_null($series)) {
            return response()->json(["message" => "Resource not found!"], 404);
        }
        $series->fill($request->all());
        $series->save();
        return response()->json($series);
    }
}
