<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackPersos extends Model
{
    use HasFactory;
    protected $primaryKey = 'packperso_id';
    protected $table="packs_persos";
    protected $guarded = [];
}
