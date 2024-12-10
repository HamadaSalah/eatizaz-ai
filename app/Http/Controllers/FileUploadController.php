<?php

namespace App\Http\Controllers;

use App\Services\FileUploadService;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function upload(Request $request)
    {
        // Call the service method to upload the file
        $fileUrl = $this->fileUploadService->uploadFile($request);

        if ($fileUrl) {
            return response()->json(['url' => $fileUrl], 200);
        }

        return response()->json(['error' => 'File upload failed'], 400);
    }
}
