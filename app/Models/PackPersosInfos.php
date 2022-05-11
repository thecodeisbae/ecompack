<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackPersosInfos extends Model
{
    use HasFactory;
    protected $primaryKey = 'packpersoinfo_id';
    protected $table = "packspersos_infos";
    protected $guarded = [];
}
