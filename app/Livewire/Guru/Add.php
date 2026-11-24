<?php

namespace App\Livewire\Guru;

use Livewire\Component;
use App\Models\Guru;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;


class Add extends Component
{
    public $nama;
    public $nip;
    public $jenis;
    public $status_asn;
    public $penempatan;
    public $tunjangan;

    public function render()
    {
        return view('livewire.guru.add');
    }

    public function submit(){
        Guru::create([
            'nama'          => $this->nama,
            'nip'           => $this->nip,
            'jenis'         => $this->jenis,
            'status_asn'    => $this->status_asn,
            'penempatan'    => $this->penempatan,
            'tunjangan'     => $this->tunjangan,
        ]);
        LivewireAlert::title('Guru Berhasil Ditambahkan!')
                ->success()
                ->show();
        return $this->redirect('/guru',navigate:true);
    }

    
}
