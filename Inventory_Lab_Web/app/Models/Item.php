<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'id';
    public $incrementing = false;  // You most probably want this too

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'items', 'length' => 6, 'prefix' => date('y')]);
        });
    }
}
