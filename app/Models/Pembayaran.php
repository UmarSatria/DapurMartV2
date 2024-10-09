<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $incrementing = true;
    public $timestamps = true;

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
