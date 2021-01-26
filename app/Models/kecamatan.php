<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    public function kota() {
        return $this->belogsTo('App/Models/kota/id_kota');
    }
    public function desa() {
        return $this->hasmany('App/Models/desa/id_kecamatan');
    }

}
