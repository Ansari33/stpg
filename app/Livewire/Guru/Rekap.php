<?php

namespace App\Livewire\Guru;

use Livewire\Component;
use App\Models\Pengajuan;
use App\Models\Guru;

class Rekap extends Component
{
    public function render()
    {
        $data = Pengajuan::where('nip', request()->id)
        ->where('tahun', date('Y'))
        ->get()->pluck('nomor','bulan')->toArray();
        $guru = Guru::where('nip', request()->id)->first();
        return view('livewire.guru.rekap', compact('data', 'guru'));
    }
}
