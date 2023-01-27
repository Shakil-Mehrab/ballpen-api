<?php

namespace App\Models;

use App\Bag\SearchableTrait;
use App\Traits\CanbeBanglaDatetime;
use App\Traits\CanBeScoped;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory,
        HasUuid,
        SearchableTrait,
        SoftDeletes,
        CanBeScoped,
        CanbeBanglaDatetime;

    protected $fillable = [
        'name',
        'address_1',
        'city',
        'postal_code',
        'country_id',
        'default',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
