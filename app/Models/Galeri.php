<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    protected $table = 'galeris';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $incrementing = true;
    public $timestamps = true;
}
