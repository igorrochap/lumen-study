<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class EpisodeController extends Controller
{
    public function index(): Collection
    {
        return Episode::all();
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json(
            Episode::create($request->all()),
            201
        );
    }

    public function show(int $id): JsonResponse
    {
        $series = Episode::find($id);
        if(is_null($series)) {
            return response()->json('', 204);
        }
        return response()->json($series);
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $series = Episode::find($id);
        if(is_null($series)) {
            return response()->json(["message" => "Resource not found!"], 404);
        }
        $series->fill($request->all());
        $series->save();
        return response()->json($series);
    }

    public function destroy(int $id): JsonResponse
    {
        $removedResource = Episode::destroy($id);
        if($removedResource === 0) {
            return response()->json(["message" => "Resource not found!"], 404);
        }
        return response()->json('', 204);
    }
}
