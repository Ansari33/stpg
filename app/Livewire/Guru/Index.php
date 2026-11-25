<?php

namespace App\Livewire\Guru;

use Livewire\Component;
use App\Models\Guru;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Index extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $data = Guru::where('nama','like','%'.$this->search.'%')->paginate(15);
        return view('livewire.guru.index',['data' => $data]);
    }

    public function searchData(){
        $this->resetPage();
        
    }

    public function confirmDelete($nama)
    {
        LivewireAlert::title('Hapus Guru ' . $nama . '?')
            ->question()
            ->withCancelButton('Batal')
            ->withConfirmButton('Hapus')
            ->onConfirm('delete', ['nama' => $nama])
            ->timer(10000)
            ->show();
    }

    public function delete($data)
    {
        $pegawai = Guru::where('nama',$data['nama'])->delete();
        LivewireAlert::title('Data Terhapus!')
            ->success()
            ->show();
        $this->resetPage();
    }
}
