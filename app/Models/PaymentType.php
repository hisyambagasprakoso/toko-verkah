<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Enums\EnumPayment;

class PaymentType extends Model
{
    // use Authenticatable;
    use HasFactory;

    protected $table = 'payment_types';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    // protected $payments = [
    //     'name' => EnumPayment::class
    // ];

}
