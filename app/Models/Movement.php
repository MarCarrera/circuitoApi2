<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $table = 'Movement';
    protected $fillable = [
        'Id',
        'Folio',
        'ItemsCount',
        'CreatedDate',
        'StatusId',
        'User'
    ];
}
