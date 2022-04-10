<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    public $timestamps = false;
    protected $table = 'episode';
    protected $fillable = [
        'season',
        'number',
        'watched',
        'series_id'
    ];
    protected $appends = ['links'];

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    public function getWatchedAttribute(bool $watched): bool
    {
        return $watched;
    }

    public function getLinksAttribute($links): array
    {
        return [
            "self" => "/api/episodes/$this->id",
            "series" => "/api/series/$this->series_id"
        ];
    }
}
