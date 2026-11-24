<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permintaan;
use App\Models\NomorSurat;
use App\Models\Guru;
use App\Models\Pengajuan;
use Session;
use Auth;
use DB;


class PermintaanController extends Controller
{

    public function delete($id) {
        $data = Permintaan::find($id);
        $data->nomorSurat()->delete();
        $data->delete();
        session()->flash('success', 'Pengajuan Berhasil Terhapus!');
        return redirect('/permintaan');
    }

    public function kwitansi($request) {
        $data = Pengajuan::with('guru')->find($request);
        $pegawai = Guru::where('nip', $data->nip)->first();
        $pegawai->terbilang = $this->formatTerbilang($pegawai->tunjangan);
        \PDF::set_option('isRemoteEnabled', TRUE);
        $pdf = \PDF::loadView('livewire.pengajuan.pdf', compact('data', 'pegawai'));
        return $pdf->stream('kwitansi.pdf');
    }


public function terbilang(float|int $nilai): string
{
    $nilai = abs($nilai);
    $huruf = [
        '', 'satu', 'dua', 'tiga', 'empat', 'lima',
        'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas'
    ];

    if ($nilai < 12) {
        return ' ' . $huruf[(int) $nilai];
    }
    if ($nilai < 20) {
        return $this->terbilang($nilai - 10) . ' belas';
    }
    if ($nilai < 100) {
        return $this->terbilang(floor($nilai / 10)) . ' puluh' . $this->terbilang(fmod($nilai, 10));
    }
    if ($nilai < 200) {
        return ' seratus' . $this->terbilang($nilai - 100);
    }
    if ($nilai < 1000) {
        return $this->terbilang(floor($nilai / 100)) . ' ratus' . $this->terbilang(fmod($nilai, 100));
    }
    if ($nilai < 2000) {
        return ' seribu' . $this->terbilang($nilai - 1000);
    }
    if ($nilai < 1000000) {
        return $this->terbilang(floor($nilai / 1000)) . ' ribu' . $this->terbilang(fmod($nilai, 1000));
    }
    if ($nilai < 1000000000) {
        return $this->terbilang(floor($nilai / 1000000)) . ' juta' . $this->terbilang(fmod($nilai, 1000000));
    }
    if ($nilai < 1000000000000) {
        return $this->terbilang(floor($nilai / 1000000000)) . ' milyar' . $this->terbilang(fmod($nilai, 1000000000));
    }
    if ($nilai < 1000000000000000) {
        return $this->terbilang(floor($nilai / 1000000000000)) . ' trilyun' . $this->terbilang(fmod($nilai, 1000000000000));
    }

    return '';
}

public function formatTerbilang(float|int $nilai, string $akhiran = 'Rupiah'): string
{
    if ((int) $nilai === 0) {
        return 'Nol ' . $akhiran;
    }

    $prefix = $nilai < 0 ? 'minus ' : '';
    $hasil = trim($prefix . trim($this->terbilang($nilai)) . ' ' . $akhiran);

    return ucfirst($hasil);
}


   
}
