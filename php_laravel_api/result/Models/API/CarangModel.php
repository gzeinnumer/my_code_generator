<?php

namespace App\Models\API;

use App\MyApp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarangModel extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = ['id','name','created_at','updated_at'];
    protected $casts = MyApp::datetime;
}