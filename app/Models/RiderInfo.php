<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderInfo extends Model
{
    use HasFactory;
    protected $table = 'riders_info';
    protected $fillable = ['rider_id', 'lat', 'long'];
}
