<?php

namespace App\Models;

use App\Traits\HasUuid;
use App\Traits\ClearsResponseCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    use HasFactory,
        HasUuid,
        SoftDeletes,
        HasRecursiveRelationships, ClearsResponseCache;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'slug',
        'name',
        'parent_id',
        'order',
    ];

    protected $with = [
        'children',
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
     * articles
     *
     * @return void
     */
    public function articles()
    {
        return $this->morphedByMany(Article::class, 'categoriable');
    }

    /**
     * user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
