<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShortURL extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_url',
        'short_code',
        'user_id'
    ];

    protected $table = 'short_urls';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function shortUrlDetails(): HasMany
    {
        return $this->hasMany(ShortURLDetail::class, 'short_url_id');
    }

    public function scopeWithLastVisitedDate(Builder $query):void
    {
        $query->selectSub(function ($query) {
            $query->select('visited_at')
                ->from('short_url_details')
                ->whereColumn('short_url_id', 'short_urls.id')
                ->latest('visited_at')
                ->limit(1);
        }, 'last_visited_at');
    }
}
