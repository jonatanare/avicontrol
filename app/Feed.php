<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    
    protected $fillable = [
        'addition_range',
        'addition_date',
        'feed_type',
        'quantity',
        'additional_notes',
    ];
}
