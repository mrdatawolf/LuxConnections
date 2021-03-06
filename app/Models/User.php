<?php

namespace App\Models;

use Creativeorange\Gravatar\Gravatar;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function members(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Member::class, 'linked_id', 'id');
    }


    public function heard(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HeardFrom::class);
    }


    public function reachedOut(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ReachedOut::class);
    }


    public function alias(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Member::class, 'user_id', 'id');
    }


    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     * @throws \Creativeorange\Gravatar\Exceptions\InvalidEmailException
     */
    protected function defaultProfilePhotoUrl(): string
    {
        $gravater = new Gravatar();
        return $gravater->get($this->email);
    }
}
