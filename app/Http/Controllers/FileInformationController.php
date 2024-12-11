<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveFilesInfoRequest;
use App\Services\FileInformationService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class FileInformationController extends Controller
{
    public function __construct(protected FileInformationService $fileInfoService)
    {
    }

    /**
     * Handle incoming file information for collection and storage.
     * 
     * @param  SaveFilesInfoRequest $request
     * @return JsonResponse
     */
    public function infoGathering(SaveFilesInfoRequest $request) : JsonResponse
    {
        $result = $this->fileInfoService->infoGathering($request->all());

        if ($result) {
            return response()->json(['message' => "The information saved successfully"], 200);
        }

        return response()->json(['error' => 'Processing failed'], 400);
    }

    /**
     * Handle incoming files information to retrieve saved data.
     * 
     * @param  Request $request
     * @return JsonResponse
     */
    public function getFilesInfo(Request $request) : JsonResponse 
    {
        $result = $this->fileInfoService->getFilesInfo($request->all());

        if ($result) {
            return response()->json(['message' => "The information retrieved successfully"], 200);
        }

        return response()->json(['error' => 'Processing failed'], 400);
    }
}
