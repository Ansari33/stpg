<?php

namespace App\Livewire\Pengajuan;

use App\Models\JenisCuti;
use App\Models\Guru;
use App\Models\Pengajuan;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Add extends Component
{
    public $pengaju;
    public $bulan;
    public $tahun;
    public $disabled = false;
    public $manual;
    public $ismanual = true;

    
    public function render()
    {
       $guru = Guru::get(['nip','nama']);
         $this->bulan = intval(date('m')) - 1 ;
         $this->tahun = date('Y');
        return view('livewire.pengajuan.add',compact('guru'));
    }

    public function submit(){

    $kode = '/KW/423212/'.date('Y');
    $nomor = $this->ismanual ?  
        strlen($this->manual) > 1 ? '00'.$this->manual.$kode :
         '000'.$this->manual.$kode
    :$this->getNomor();
    
        try {
            if($this->cekPengajuan() > 0){
                LivewireAlert::title('Pengajuan Sudah Ada!')
                ->warning()
                ->show();
                return ;
            }
            Pengajuan::create([
                'nip'         => $this->pengaju,
                'nomor'      => $nomor,
                'bulan'      => $this->bulan,
                'tahun'      => $this->tahun,
            ]);
            LivewireAlert::title('Pengajuan Berhasil Ditambahkan!')
            ->success()
            ->show();
            return $this->redirect('/pengajuan',navigate:true);

        } catch (\Exception $e) {
            LivewireAlert::title($e->getMessage())
                ->warning()
                ->show();
                return ;
        }
           
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

    public function cekPengajuan(){
       return Pengajuan::where('bulan', $this->bulan)
            ->where('tahun', $this->tahun)
            ->where('nip', $this->pengaju)
            ->count();

    }

    public function setManual(){
        LivewireAlert::title('Pengajuan Berhasil Ditambahkan!')
            ->success()
            ->show();
    }

}
