<?php

namespace App\Services;

use App\Http\Resources\FileInformationResource;
use App\Models\File;
use App\Models\FileInformation;
use Illuminate\Support\Facades\Http;

class FileInformationService
{
    /**
     * Process and save file information data for centralized storage and management.
     * 
     * @param  array $data
     * @return string|null
     */
    public function infoGathering(array $data): ?string
    {
        try {
            $response = Http::withOptions([
                'verify' => false,
            ])->get('https://jsonplaceholder.typicode.com/posts'); //This url is for testing purposes only
    
            $fileInfo = FileInformation::create([
                'uuid' => $data['uuid'],
                'data' => $response->json()
            ]);

            $fileInfoId = $fileInfo->id;
            collect($data['urls'])->map(function ($url) use ($fileInfoId) {
                File::create([
                    'file_info_id' => $fileInfoId,
                    'path' => $url,
                ]);
            });

            return 'The information saved successfully';
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    /**
     * Handle incoming files information to retrieve saved data.
     * 
     * @param  array $data
     * @return JsonResponse
     */
    public function getFilesInfo(array $data) : JsonResponse 
    {
        //....
    }
}