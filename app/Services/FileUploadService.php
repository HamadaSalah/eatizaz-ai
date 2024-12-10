<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FileUploadService
{
    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,png,jpg,jpeg,webp,wav,mp3', 
        ]);

        // Check if a file is uploaded
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Generate a unique file name
            $fileName = time() . '_' . str_replace(' ', '', $file->getClientOriginalName());

            // Store file in the 'uploads' directory in storage
            $path = $file->storeAs('uploads', $fileName, 'public');

            // Get the full URL using the app URL
            $fullUrl = url(Storage::url($path));

            return $fullUrl;
        }

        return null;
    }
}
