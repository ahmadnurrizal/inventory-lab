<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $id = 'id';
    protected $fillable=[
      'creator', 'start_date', 'end_Date'
    ]

}
