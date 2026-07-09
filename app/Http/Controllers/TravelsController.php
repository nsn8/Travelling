<?php

namespace App\Http\Controllers;

use App\DTO\Travels\TravelDTO;
use App\DTO\Travels\TravelsListDTO;
use App\Http\Requests\TravelDeleteRequest;
use App\Http\Requests\TravelListRequest;
use App\Http\Requests\TravelSaveRequest;
use App\Http\Services\TravelsService;
use Illuminate\Http\JsonResponse;

class TravelsController extends Controller
{
    protected TravelsService $service;

    public function __construct(TravelsService $service)
    {
        $this->service = $service;
    }

    public function list(TravelListRequest $request): JsonResponse
    {
        $data = new TravelsListDTO($request->input());

        return response()->json($this->service->getList($data));
    }

    public function save(TravelSaveRequest $request): JsonResponse
    {
        $data = new TravelDTO($request->input());

        $this->service->save($data);

        return response()->json(['success' => true]);
    }

    public function delete(TravelDeleteRequest $request): JsonResponse
    {
        $data = new TravelDTO($request->input());

        $this->service->delete($data);

        return response()->json(['success' => true]);
    }

    public function get(int $id)
    {
        $travel = $this->service->get($id);

        return view('travel', $travel);
    }
}
