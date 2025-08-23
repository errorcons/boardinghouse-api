<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'contract_start_date', 'contract_end_date', 'rental_amount',
    ];
}
