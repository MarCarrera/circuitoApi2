<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lisson extends Model
{
    use HasFactory;

    protected $table = 'Lisson';
    protected $fillable = [
        'Id',
        'Name',
        'DeviceTypesId'
    ];
}
