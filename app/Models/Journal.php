<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    protected $fillable = ['shipment_id', 'amount', 'type'];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
