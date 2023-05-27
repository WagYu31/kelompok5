<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanKeperawatanPasien extends Model
{
    use HasFactory;

    protected $table = "catatan_keperawatan_pasien";
    protected $guarded = [];

    public function dokter()
    {
        return $this->belongsTo(User::class);
    }
}
