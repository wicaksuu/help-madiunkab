<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imei extends Model
{
    use HasFactory;
    protected $fillable = [
        'userid',
        'nip',
        'nama',
        'opd',
        'alasan',
        'status',
    ];
}
