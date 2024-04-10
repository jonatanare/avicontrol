<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flock extends Model
{

    protected $fillable = [
        'name',
        'number_of_chickens',
        'flock_purpose',
        'acquisition_type',
        'date_of_acquisition',
        'aditional_notes'
    ];

    public function getAllFlocks()
    {
        return $this->all();
    }
}
