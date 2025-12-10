<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';
    protected $primaryKey = 'store_id';
    public $timestamps = false;

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function manager()
    {
        return $this->belongsTo(Staff::class, 'manager_staff_id');
    }
}
