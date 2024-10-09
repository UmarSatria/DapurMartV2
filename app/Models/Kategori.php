<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = ['kategori'];

    protected $table = 'kategoris';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $incrementing = true;
    public $timestamps = true;

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

}
