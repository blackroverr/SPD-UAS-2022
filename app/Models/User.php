<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    // protected $fillable = [
    //     'id',
    //     'name',
    //     'photo',
    //     'email',
    //     'password',
    //     'role_id',
    //     'active',
    // ];

    protected $guarded = ['id'];

    public $deleted_at = false;

    protected $hidden = [
        'password', 'remember_token',
    ];

    // protected $appends = ['photo'];

    // public function getPhotoUrlAttribute()
    // {
    //     if ($this->foto !== null) {
    //         return url('media/user/' . $this->id . '/' . $this->foto);
    //     } else {
    //         return url('media-example/no-image.png');
    //     }
    // }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

  
}
