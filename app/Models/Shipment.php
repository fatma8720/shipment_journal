<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'shipper', 'image', 'weight', 'description', 'status'];

    public static function boot()
    {
        parent::boot();
        self::saving(function ($model) {
            if ($model->weight >= 1 && $model->weight < 10) {
                $model->price = 10;
            } elseif ($model->weight >= 10 && $model->weight < 25) {
                $model->price = 100;
            } elseif ($model->weight >= 25) {
                $model->price = 300;
            } else {
                $model->price = 0;
            }
        });
    }
}
