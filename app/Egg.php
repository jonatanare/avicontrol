<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egg extends Model
{
    // Define los campos fillable para protección de asignación masiva
    protected $fillable = ['collection_range', 'collection_date', 'good_eggs', 'bad_eggs', 'additional_notes'];
}
