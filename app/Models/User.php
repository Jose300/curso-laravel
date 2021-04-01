<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttibute($password)
    {        
        $this->attributes['password'] = bcrypt($password);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'assigned_roles');
    }

    public function hasRoles(array $roles)
    {

        foreach ($roles as $role) {

            /*Utilizando Foreach Normal
            foreach ($this->roles as $userRole) {
            
                if ($userRole->name === $role) {
                
                return true;

                }

            }*/

            //Utilizando Collection
            return $this->roles->pluck('name')->intersect($roles)->count();
        } 

        return false;
    }

    //Verifica si el usuario tiene el rol de Administrador
    public function isAdmin()
    {
        return $this->hasRoles(['Admin']);
    }

    public function note()
    {
        return $this->morphOne(Note::class, 'notable');
    }


    //Etiquetas
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }
}
