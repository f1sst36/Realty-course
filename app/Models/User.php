<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

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
        'password',
        'phone',
        'role_id',
        'created_at',
        'updated_at',
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

    public static function getAccesses(){
        $user = User::findOrFail(Auth::user()->id)->with('role')->where('id', '=', Auth::user()->id)->first();
        $accesses = \DB::table('access_users')->select(['section_id'])->where('role_id', '=', $user->role->id)->get()->keyBy('section_id');
        return $accesses;
    }

    public function role(){
        return $this->belongsTo(UserRole::class, 'role_id');
    }
}
