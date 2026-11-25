<?php

namespace App\Livewire\Pengajuan;

use App\Models\Pengajuan;
use App\Models\Guru;
use App\Models\JenisCuti;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Edit extends Component
{
    public $data;
    public $pengaju;
    public $bulan;
    public $tahun;
    public $disabled = false;
    public $manual;
    public $ismanual = true;

    public function render()
    {
        $guru = collect(Guru::get(['nama','id','nip'])->toArray())->map(function($item) {
            return array_merge($item, [
                'selected' => $item['nip'] === $this->pengaju ? 'selected' : ''
            ]);
        });
      
        return view('livewire.pengajuan.edit',compact('guru'));
    }
    public function mount($id){
        $this->data     = Pengajuan::find($id);

        $this->pengaju  = $this->data->nip;
        $this->bulan    = $this->data->bulan;
        $this->tahun    = $this->data->tahun;
        $this->manual = str_replace('0','',explode('/', $this->data->nomor)[0]) ;
         
    }

    public function update(){

        $kode = '/KW/423212/'.date('Y');
        $nomor = $this->ismanual ?  
            strlen($this->manual) > 1 ? '00'.$this->manual.$kode :
            '000'.$this->manual.$kode
        :$this->getNomor();

        $pengajuan      = Pengajuan::find($this->data->id);
        #$pegawai        = Guru::where('nip', $this->pengaju)->first();
        $pengajuan->nip = $this->pengaju;
        $pengajuan->bulan = $this->bulan;
        $pengajuan->tahun = $this->tahun;
        $pengajuan->nomor = $nomor;
        $pengajuan->save();

        LivewireAlert::title('Pengajuan Berhasil Diupdate!')
            ->success()
            ->show();
        return $this->redirect('/pengajuan',navigate:true);
    
    }

    public function getNomor(){
        $nomor = '';
       $count = Pengajuan::where('tahun', $this->tahun)->count();
        if ($count == 0) {
            $nomor = '0001';
        } else {
            $nomor = strlen($count + 1) > 1 ? '00'.$count + 1 : '000'.$count + 1;
        }    

        return $nomor."/KW/423212/".date('Y');
    }

}
