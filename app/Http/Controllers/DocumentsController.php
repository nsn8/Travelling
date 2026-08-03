<?php

namespace App\Http\Controllers;

use App\DTO\Documents\DocumentsListDTO;
use App\DTO\Documents\DocumentTimelineDTO;
use App\Factories\DocumentDTOFactory;
use App\Http\Requests\DocumentDeleteRequest;
use App\Http\Requests\DocumentListRequest;
use App\Http\Requests\DocumentSaveRequest;
use App\Http\Requests\DocumentTimelineRequest;
use App\Http\Services\DocumentsService;
use Illuminate\Http\JsonResponse;

class DocumentsController extends Controller
{
    protected DocumentsService $service;

    public function __construct(DocumentsService $service)
    {
        $this->service = $service;
    }

    public function save(DocumentSaveRequest $request): JsonResponse
    {
        $data = DocumentDTOFactory::create($request->input());

        $this->service->save($data);

        return response()->json(['success' => true]);
    }

    public function list(DocumentListRequest $request): JsonResponse
    {
        $data = new DocumentsListDTO($request->input());

        return response()->json($this->service->getList($data));
    }

    public function delete(DocumentDeleteRequest $request): JsonResponse
    {
        $data = DocumentDTOFactory::create($request->input());

        $this->service->delete($data);

        return response()->json(['success' => true]);
    }

    public function timeline(DocumentTimelineRequest $request): JsonResponse
    {
        $data = new DocumentTimelineDTO($request->input());

        return response()->json($this->service->compileTimeline($data));
    }
}
