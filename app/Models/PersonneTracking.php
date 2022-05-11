<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonneTracking extends Model
{
    use HasFactory;
    protected $table= "personnes_trackings";
    protected $guarded = [];
}
