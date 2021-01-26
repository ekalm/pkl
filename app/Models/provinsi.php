<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    use HasFactory;
    public function kota() {
        return $this->hasmany('App/Models/kota/id_provinsi');
    }
}
