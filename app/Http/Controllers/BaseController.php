<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

abstract class BaseController
{
    protected string $model;

    public function index(): Collection
    {
        return $this->model::all();
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json(
            $this->model::create($request->all()),
            201
        );
    }

    public function show(int $id): JsonResponse
    {
        $resource = $this->model::find($id);
        if(is_null($resource)) {
            return response()->json('', 204);
        }
        return response()->json($resource);
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $resource = $this->model::find($id);
        if(is_null($resource)) {
            return response()->json(["message" => "Resource not found!"], 404);
        }
        $resource->fill($request->all());
        $resource->save();
        return response()->json($resource);
    }

    public function destroy(int $id): JsonResponse
    {
        $removedResource = $this->model::destroy($id);
        if($removedResource === 0) {
            return response()->json(["message" => "Resource not found!"], 404);
        }
        return response()->json('', 204);
    }
}
