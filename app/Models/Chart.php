<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;

    protected $table = 'charts';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $incrementing = true;
    public $timestamps = true;

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }

}
