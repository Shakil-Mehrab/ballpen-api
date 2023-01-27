<?php

namespace App\Models;

use App\Bag\SearchableTrait;
use App\Traits\HasUuid;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Region extends Model
{
    use HasFactory,
        HasUuid,
        SearchableTrait,
        SoftDeletes,
        HasRecursiveRelationships,
        Sluggable;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'name',
        'display_name',
        'slug',
        'parent_id',
        'order',
        'lat',
        'lng',
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
            'regions.name' => 10,
        ],
    ];

    /**
     * articles
     *
     * @return void
     */
    public function articles()
    {
        return $this->morphedByMany(Article::class, 'regionable');
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
