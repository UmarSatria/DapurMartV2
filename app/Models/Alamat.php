<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nama_jalan', 'provinsi', 'kota', 'kecamatan', 'kelurahan', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
