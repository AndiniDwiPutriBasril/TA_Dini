<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealtimeData extends Model
{
    protected $table = 'realtime_data';

    protected $fillable = [

        'sudut_paha',
        'sudut_betis',
        'sudut_lutut',
        'status'
    ];
}