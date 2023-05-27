<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = "pasiens";
    protected $guarded = [];


    // public function getBirthdayAttribute($birthday)
    // {
    //     $birthday = Carbon::parse($birthday)->age;
    //     return $birthday;
    // }
}
