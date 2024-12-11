<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /** @use HasFactory<\Database\Factories\FileInformationFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_info_id',
        'path',
    ];

    /**
     * Get the FileInformation associated with this file.
     */
    public function fileInformation(): BelongsTo
    {
        return $this->belongsTo(FileInformation::class, 'file_info_id');
    }
}
