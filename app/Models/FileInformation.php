<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class FileInformation extends Model
{
    /** @use HasFactory<\Database\Factories\FileFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'data',
    ];

    /**
     * The attributes that need to cast.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'json',
    ];

    /**
     * Get the files associated with this FileInformation.
     */
    public function files(): HasMany
    {
        return $this->hasMany(File::class, 'file_info_id');
    }
}

