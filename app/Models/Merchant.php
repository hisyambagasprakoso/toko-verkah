<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    // use Authenticatable;
    use HasFactory;

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

    public function admin()
    {
        return $this->belongsTo(Admins::class,'last_updated_by','username');
    }

    public function transactions()
    {
        return $this->hasMany(Transactions::class, 'merchant_id', 'id');
    }

}
