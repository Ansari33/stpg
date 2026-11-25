<?php

namespace App\Livewire\Guru;

use Livewire\Component;
use App\Models\Guru;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $data;
    public $nama;
    public $nip;
    public $jenis;
    public $status_asn;
    public $penempatan;
    public $tunjangan;

    public function render()
    {
        
        return view('livewire.guru.edit');
    }

    public function mount($id){
         $this->data        = Guru::where('nip',$id)->first();
         $this->nama        = $this->data->nama;
         $this->nip         = $this->data->nip;
         $this->jenis       = $this->data->jenis;
         $this->status_asn  = $this->data->status_asn;
         $this->penempatan  = $this->data->penempatan;
         $this->tunjangan   = $this->data->tunjangan;
    }

    public function update(){
        $guru               = Guru::find($this->data->id);
        $guru->nama         = $this->nama;
        $guru->nip          = $this->nip;
        $guru->jenis        = $this->jenis;
        $guru->status_asn   = $this->status_asn;
        $guru->penempatan   = $this->penempatan;
        $guru->tunjangan    = $this->tunjangan;
        $guru->save();

        LivewireAlert::title('Guru Berhasil Diupdate!')
            ->success()
            ->show();
        return $this->redirect('/guru',navigate:true);
    }
}
