<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard_web= 'web';
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public  function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public  function posts(){
        return $this->hasMany(Post::class, 'user_id');
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //aca tenemos que escribir el codigo para recuperar la imagen de perfil
    public function adminlte_image()
    {
        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc()
    {
        return optional(auth()->user()->created_at)->locale('es')->translatedFormat('l d \d\e F \d\e\l\ Y');
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }
}
