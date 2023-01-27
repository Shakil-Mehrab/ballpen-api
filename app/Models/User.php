<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Presenters\UserPresenter;
use App\Notifications\Auth\ResetPasswordNotification;
use App\Traits\HasProfilePhoto;
use App\Traits\HasUuid;
use App\Traits\SearchableQueryTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        SoftDeletes,
        HasUuid,
        InteractsWithMedia,
        HasProfilePhoto,
        SearchableQueryTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'display_name',
        'phone_number',
        'bio',
        'is_admin',
        'deactivated_at',
        'region_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'deactivated_at' => 'datetime',
    ];

    /**
     * appends
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * routeBindingKeys
     *
     * @var array
     */
    protected $routeBindingKeys = [
        'uuid',
    ];

    public function getRouteKey()
    {
        return 'id';
    }

    public function present()
    {
        return new UserPresenter($this);
    }

    /**
     * sendPasswordResetNotification
     *
     * @param  mixed  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * articles
     *
     * @return void
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    /**
     * categories
     *
     * @return HasMany
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    /**
     * tags
     *
     * @return HasMany
     */
    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }

    /**
     * topics
     *
     * @return HasMany
     */
    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }

    /**
     * region
     *
     * @return BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * registerMediaConversions
     *
     * @param  mixed  $media
     * @return void
     */
    // public function registerMediaConversions(?Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb1200x628')
    //         ->fit(Manipulations::FIT_CROP, 1200, 628);

    //     $this->addMediaConversion('thumb600x314')
    //         ->fit(Manipulations::FIT_CROP, 600, 314);

    //     $this->addMediaConversion('thumb160x84')
    //         ->fit(Manipulations::FIT_CROP, 160, 84);
    // }
}
