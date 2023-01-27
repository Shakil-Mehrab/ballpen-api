<?php

namespace App\Models;

use App\Traits\HasUuid;
use App\Traits\HasMetable;
use App\Traits\CanBeScoped;
use App\Bag\SearchableTrait;
use App\Traits\CanbeBanglaDatetime;
use App\Traits\ClearsResponseCache;
use App\Traits\SearchableQueryTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Presenters\ArticlePresenter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Article extends Model
{
    use HasFactory,
        HasUuid,
        SearchableTrait,
        SoftDeletes,
        CanBeScoped,
        CanbeBanglaDatetime,
        HasMetable,
        ClearsResponseCache,
        SearchableQueryTrait;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'slug',
        'title',
        'kicker',
        'thumbnail_id',
        'teaser',
        'content',
        'status',
        'pinned',
        'published_at',
        'publisher_id',
        'reporter',
    ];

    /**
     * casts
     *
     * @var array
     */
    protected $casts = [
        'pinned' => 'boolean',
        'published_at' => 'datetime',
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

    public function present()
    {
        return new ArticlePresenter($this);
    }

    /**
     * user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * categories
     *
     * @return MorphToMany
     */
    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categoriable')->orderBy('order', 'asc');
    }

    /**
     * topics
     *
     * @return MorphToMany
     */
    public function topics(): MorphToMany
    {
        return $this->morphToMany(Topic::class, 'topicable')->orderBy('order', 'asc');
    }

    /**
     * tags
     *
     * @return MorphToMany
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * regions
     *
     * @return MorphToMany
     */
    public function regions(): MorphToMany
    {
        return $this->morphToMany(Region::class, 'regionable');
    }

    /**
     * thumbnail
     *
     * @return BelongsTo
     */
    public function thumbnail(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'thumbnail_id');
    }

    /**
     * scopePublished
     *
     * @param  mixed  $builder
     * @return void
     */
    public function scopePublished(Builder $builder)
    {
        return $builder->where('status', 'published');
    }
}
