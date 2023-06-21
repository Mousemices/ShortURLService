<?php

namespace App\Models;

use Database\Factories\ShortURLDetailFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShortURLDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'device',
        'ip_address',
        'operating_system',
        'visit_at',
        'short_url_id'
    ];

    protected $table = 'short_url_details';

    public function shortUrl(): BelongsTo
    {
        return $this->belongsTo(ShortURL::class);
    }
}
