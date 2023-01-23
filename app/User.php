<?php

namespace App;

use App\Notifications\ResetPassword;
use App\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Storage;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements JWTSubject, MustVerifyEmail
{
    use Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'kikan_id',
        'com_name',
        'com_huri_name',
        'tanto_name',
        'department_name',
        'role_name',
        'is_personal',
        'kind',
        'zipcode',
        'prefecture',
        'city',
        'building',
        'telephone',
        'fax',
        'introduction',
        'is_email_authenticated',
        'token',
        'token_at',
        'available',
        'need_pay'
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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */

    /**
     * Get the profile photo URL attribute.
     *
     * @return string
     */
    public function getPhotoUrlAttribute()
    {
        return 'https://www.gravatar.com/avatar/'.md5(strtolower($this->email)).'.jpg?s=200&d=mm';
    }

    public function getAvatarUrlAttribute()
    {
        if (is_null($this->avatar)) {
            return 'https://www.gravatar.com/avatar/'.md5(strtolower($this->email)).'.jpg?s=200&d=mm';
        }

        return Storage::disk('public')->url($this->avatar);
    }

    /**
     * Get the oauth providers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function oauthProviders()
    {
        return $this->hasMany(OAuthProvider::class);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * @return int
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function available_contents() {
        return $this->hasMany('\App\Models\AvailableContent', 'user_id');
    }
    
    public function available_jobs() {
        return $this->hasMany('\App\Models\AvailableJob', 'user_id');
    }
    
    public function available_prices() {
        return $this->hasMany('\App\Models\AvailablePrice', 'user_id');
    }

    public function available_amounts() {
        return $this->hasMany('\App\Models\AvailableAmount', 'user_id');
    }
}
