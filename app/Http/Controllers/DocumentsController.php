<?php

namespace App\Http\Controllers;

use App\Factories\DocumentDTOFactory;
use App\Http\Requests\DocumentSaveRequest;
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
}
