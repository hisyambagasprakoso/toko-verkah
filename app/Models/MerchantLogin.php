<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MerchantLogin extends Authenticatable
{
    // use Authenticatable;
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    protected $table = 'merchants';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'password',
        'username',
        'created_at',
        'updated_at',
        'last_updated_by'
    ];

}
