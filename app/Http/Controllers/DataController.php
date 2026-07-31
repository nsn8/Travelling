<?php

namespace App\Http\Controllers;

use App\DTO\Data\SearchAirportDTO;
use App\Http\Requests\SearchAirportRequest;
use App\Http\Services\DataService;
use Illuminate\Http\JsonResponse;

class DataController extends Controller
{
    protected DataService $service;

    public function __construct(DataService $service)
    {
        $this->service = $service;
    }

    public function airports(SearchAirportRequest $request): JsonResponse
    {
        return response()->json($this->service->searchAirports(new SearchAirportDTO($request->input())));
    }
}
