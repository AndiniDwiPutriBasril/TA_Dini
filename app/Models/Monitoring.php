<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    protected $table = 'monitoring';

    protected $fillable = [
        'sudut_paha',
        'sudut_betis',
        'sudut_lutut',
        'status_gerakan'
    ];
}
