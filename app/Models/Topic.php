<?php

namespace App\Models;

use App\Traits\HasUuid;
use App\Bag\SearchableTrait;
use App\Traits\ClearsResponseCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory,
        HasUuid,
        SearchableTrait,
        SoftDeletes, ClearsResponseCache;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'slug',
        'name',

    ];

    /**
     * getRouteKeyName
     *
     * @return void
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * searchable
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'topics.name' => 10,
        ],
    ];

    /**
     * articles
     *
     * @return void
     */
    public function articles()
    {
        return $this->morphedByMany(Article::class, 'topicable');
    }

    /**
     * user
     *
     * @return void
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
