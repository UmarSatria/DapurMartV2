<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'store_name', 'store_icon', 'slogan', 'store_description', 'store_address'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barang() {
        return $this->hasMany(Barang::class);
    }
}
