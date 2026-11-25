@section('title', __('Guru'))
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
@endphp    
<div>
  <div class="card">
    <div class="row">
      <div class="col-lg-8">
        <h5 class="card-header">Rekapan {{ $guru->nama." ".date('Y') }} </h5>
      </div>
    
    </div>
    
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Bulan</th>
            <th>Nomor</th>
            <th>Status</th>
          </tr>
          
        </thead>
        <tbody class="table-border-bottom-0">
         @for($i = 1; $i <= 12; $i++)
          <tr>
            <td>{{ $i }}</td>
            <td>
              <i class="icon-base fab fa-angular text-danger me-4"></i>
              <span class="fw-medium">{{ $guru->nama }}</span>
            </td>
            <td>{{ $bulan[$i] }}</td>
            <td>
              {{ array_key_exists($i, $data) ? $data[$i] : '-' }}
            </td>
            <td>
              <span class="">
                {{ array_key_exists($i, $data) ? 'Ada' : 'Tidak Ada' }}
              </span>
            </td>
            
          </tr>
         @endfor
        </tbody>
      </table>

    </div>

   
  </div>
</div>