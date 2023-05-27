<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;

    protected $table = "dokters";
    protected $guarded = [];


    // public function getBirthdayAttribute($birthday)
    // {
    //     $birthday = Carbon::parse($birthday)->age;
    //     return $birthday;
    // }

    public function dokter()
    {
        return $this->belongsTo(User::class);
    }
}
