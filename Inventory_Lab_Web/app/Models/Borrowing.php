<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Borrowing extends Model
{
    use HasFactory;
    protected $id ='id';
    protected $fillable = [
      'borrower',
      'borrowing_date',
      'returning_date',
      'status',
      'fine'
    ]

    public function items(){
      return $this->belongToMany(Item::class);
    }

    protected $cast = [
      'borrowing_date' => 'datetime',
      'returning_date' => 'datetime',
    ]
}
