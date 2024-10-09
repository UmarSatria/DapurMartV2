<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $incrementing = true;
    public $timestamps = true;

    public function cart()
    {
        return $this->belongsTo(Chart::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

}
