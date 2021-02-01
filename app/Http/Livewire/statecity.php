<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provinsi;
use App\Models\kota;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\Rw;
use App\Models\Kasus2;

class Statecity extends Component
{
    public $provinsi;
    public $kota;
    public $kecamatan;
    public $kelurahan;
    public $rw;
 

    public $selectedState = NULL;
    public $selectedState2 = NULL;
    public $selectedState3 = NULL;
    public $selectedState4 = NULL;
    public $selectedState5 = NULL;
 

    public function mount()
    {
        $this->provinsi = Provinsi::all();
        $this->kota = collect();
        $this->kecamatan = collect();
        $this->kelurahan = collect();
        $this->rw = collect();
    }

    public function render()
    {
        return view('livewire.statecity');
    }

    public function updatedSelectedState($provinsi)
    {
        if (!is_null($provinsi)) {
            $this->kota = Kota::where('id_provinsi', $provinsi)->get();
        }
    }

    public function updatedSelectedState2($kota)
    {
        if (!is_null($kota)) {
            $this->kecamatan = Kecamatan::where('id_kota', $kota)->get();
        }
    }

    public function updatedSelectedState3($kecamatan)
    {
        if (!is_null($kecamatan)) {
            $this->kelurahan = Kelurahan::where('id_kecamatan', $kecamatan)->get();
        }
    }

    public function updatedSelectedState4($kelurahan)
    {
        if (!is_null($kelurahan)) {
            $this->rw = Rw::where('id_kelurahan', $kelurahan)->get();
        }
    }

    public function updatedSelectedState5($rw)
    {
        if (!is_null($rw)) {
            $this->kasus2 = Kasus2::where('id_rw', $rw)->get();
        }
    }
}