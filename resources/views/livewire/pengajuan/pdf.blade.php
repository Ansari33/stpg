<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KWITANSI</title>
</head>
<style>
    table {
        border-collapse: collapse;
        /* Collapses adjacent cell borders into a single border */
        width: 100%;
        /* margin-bottom: 15px;
        margin-top: 15px; */
    }

    

    /* td {
        padding: 10px;
    } */

    .tbl {
            margin-bottom: 60px;
            margin-top: 0px;
    }

    /* .tbl td {
        padding: 5px;
    } */

    h4 {
        text-align: center;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
    }

    .tglctk {
        margin: 200px, 0px, 10px, 0px;
    }

    .kwts {
        margin-top: 60px;
        margin-bottom: 100px;
        font-size: 14px;
    }

    .kwts td {
        padding: 5px;
    }


</style>

@php
    $bulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];

    $ttdAlinPath = public_path('assets/img/ttd-alin-nobg.png');
    $ttdHidaPath = public_path('assets/img/ttd-hida-nobg.png');

    $ttdAlin = is_file($ttdAlinPath)
        ? 'data:image/jpeg;base64,' . base64_encode(file_get_contents($ttdAlinPath))
        : null;
    $ttdHida = is_file($ttdHidaPath)
        ? 'data:image/jpeg;base64,' . base64_encode(file_get_contents($ttdHidaPath))
        : null;
@endphp    
<body>


    <table class="tbl" >
        <tr>
            <td width="60%"></td>
            <td width="20%">Tahun Angggaran</td>
            <td width="30%">: {{ $data->tahun }}</td>
        </tr>
        <tr>
            <td width="60%"></td>
            <td width="20%">Nomor Bukti</td>
            <td width="30%">: {{ $data->nomor }}</td>
        </tr>
        <tr>
            <td width="60%"></td>
            <td width="20%">Akun</td>
            <td width="30%">: 6708-EBA-511152</td>
        </tr>
        <tr>
            <td width="60 %"></td>
            <td width="20%">Kepada</td>
            <td width="30%">: {{ $pegawai->nama }}</td>
        </tr> 
        <tr>
            <td width="60%"></td>
            <td width="15%">Satker</td>
            <td width="35%">: 423212 - Kantor Kementerian Agama Kab.Sumba Timur</td>
        </tr>    

    </table>

    <center>
    <span style="font-weight: bold;
    text-align: center;
    font-size: 18px;
    ">Kuitansi / Bukti Pembayaran
    </span>
    </center>
    

<table class="kwts" >
        <tr>
            <td width="25%">Sudah Terima Dari</td>
            <td width="70%"> : <strong>Pejabat Pembuat Komitmen</strong> </td>
        </tr>
        <tr>
            <td>Jumlah Uang</td>
            <td> : <strong>Rp. {{ number_format($pegawai->tunjangan, 0, ',', '.') }}</strong> </td>
        </tr>
        <tr>
            <td>Terbilang</td>
            <td> : <strong>{{ $pegawai->terbilang }}</strong> </td>
        </tr>
        <tr>
            <td>Kuitansi Supplier</td>
            <td> : </td>
        </tr>
        <tr>
            <td>Untuk Pembayaran</td>
            <td> : Pembayaran Tunjangan Sertifikasi {{ $pegawai->jenis }} {{ $pegawai->status_asn }} Kemenag untuk Bulan {{  $bulan[$data->bulan]." ".$data->tahun }}  pada Program {{ $data->penempatan }} Kantor Kementerian Agama Kabupaten Sumba Timur Tahun Anggaran {{ $data->tahun }}  </td>
        </tr>

    </table>

    <table style="width: 100%; margin-top: 50px; font-size: 14px;">
        <tr>
            <td width="50%"></td>
            <td width="50%" style="text-align: center;">Waingapu, {{date("d")." ".$bulan[date("n")]." ".date("Y")}}</td>
        </tr>
        <tr>
            <td width="50%" style="text-align: center;"></td>
            <td width="50%" style="text-align: center;">Penerima</td>
        </tr>
        <tr>
            <td width="50%" style="text-align: center; padding-top: 70px;"></td>
            <td width="50%" style="text-align: center; padding-top: 70px;">{{ $pegawai->nama }}</td>
        </tr>
        <tr>
            <td width="50%" style="text-align: center; "></td>
            <td width="50%" style="text-align: center; ">NIP. {{ $pegawai->nip }}</td>
        </tr>
        
    </table>
    
    <table style="width: 100%; margin-top: 50px; font-size: 14px;">
        <tr>
            <td width="50%" style="text-align: center;">a.n. Kuasa Pengguna Anggaran</td>
            <td width="50%" style="text-align: center;">Lunas dibayar, {{date("d")." ".$bulan[date("n")]." ".date("Y")}}</td>
        </tr>
        <tr>
            <td width="50%" style="text-align: center;">Pejabat Pembuat Komitmen</td>
            <td width="50%" style="text-align: center;">Bendahara Pengeluaran</td>
        </tr>
       <tr>
            <td width="50%" style="text-align: center; ">
                @if($ttdAlin)<img src="{{ $ttdAlin }}" width="100px" alt="Tanda tangan Marlin Carolyn Lobo">@endif
            </td>
            <td width="50%" style="text-align: center; ">
                @if($ttdHida)<img src="{{ $ttdHida }}" width="100px" alt="Tanda tangan Nur Hidayah">@endif
            </td>
        <tr>
            <td width="50%" style="text-align: center; ;">MARLIN CAROLYN LOBO, SE </td>
            <td width="50%" style="text-align: center; ;">NUR HIDAYAH</td>
        </tr>
        <tr>
            <td width="50%" style="text-align: center; ">NIP.198608032011012013 </td>
            <td width="50%" style="text-align: center; ">NIP.198511052014112002 </td>
        </tr>
        
    </table>
    
    <span>

    </span>
    <table>
        
    </table>

</body>

</html>