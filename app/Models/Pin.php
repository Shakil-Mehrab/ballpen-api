<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pin extends Model
{
    use HasFactory, ClearsResponseCache;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'article_id',
    ];

    /**
     * article
     *
     * @return void
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    /**
     * getRouteKeyName
     *
     * @return void
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}
