<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    public function provinsi() {
        return $this->belogsTo('App/Models/provinsi/id_provinsi');
    }
    public function kecamatab() {
      return $this->hasMany('App/Models/kecamatan/id_kota');
    }
}
