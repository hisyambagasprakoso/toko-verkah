<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Admin as Authenticatable;

class Admin extends Authenticatable
{
    // use Authenticatable;
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    // protected $guard_name = 'admin';

    public $table = "admins";
    public $guard = "admin";
    protected $primaryKey = 'id';
    protected $fillable = [
        'username',
        'password',
        'created_at',
        'updated_at',
        'last_updated_by'
    ];

    public function merchants()
    {
        return $this->hasMany(Merchant::class,'last_updated_by','username');
    }

}
