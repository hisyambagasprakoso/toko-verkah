<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // use Authenticatable;
    use HasFactory;

    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'amount',
        'content',
        'payment_type',
        'created_at',
        'updated_at',
        'merchant_id'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id','id');
    }

}
