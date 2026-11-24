@section('title', __('Pengajuan Cuti'))
<div>
  <div class="card">
    <div class="row">
      <div @if(auth()->user()->hasRole('admin')) class="col-lg-6" @else class="col-lg-9" @endif >
        <h5 class="card-header">Daftar Pengajuan</h5>
      </div>
      {{-- 
      <div class="col-lg-1 mt-5">
        <a class="btn btn-success ml-4" href="{{ route('pegawai.import') }}" wire:navigate>{{ __('import') }}</a>
      </div>
       --}}
       @if(auth()->user()->hasRole('admin'))
      <div class="col-lg-3 mt-5">
        <input placeholder="cari nama" wire:model="search" class="form-control" wire:keydown="searchData" />
      </div>
      @endif
      <div class="col-lg-1 mt-5">
        <a class="btn btn-outline-danger ml-2" href="#" wire:click="exportPdf">{{ __('PDF') }}</a>
      </div>
      <div class="col-lg-1 mt-5">
        <a class="btn btn-success ml-2" href="#" wire:click="exportExcel">{{ __('Excel') }}</a>
      </div>
      <div class="col-lg-1 mt-5">
        <a class="btn btn-primary ml-2" href="{{ route('pengajuan.add') }}" wire:navigate>{{ __('Baru') }}</a>
      </div>
    </div>
    <div class="m-2">
      @if (session()->has('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif
    </div>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Pengaju</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Kwintasi</th>
            <th>Actions</th>
          </tr>
          
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($data as $perm => $p )
          <tr>
            <td>{{ $p->nomor }}</td>
            <td>
              <i class="icon-base fab fa-angular text-danger me-4"></i>
              <span class="fw-medium">{{ $p->guru->nama }}</span>
            </td>
            <td>{{ $p->bulan }}</td>
            <td>
              {{ $p->tahun }}
            </td>
            <td>
              <span class=""> <a href="/pengajuan/kwitansi/{{ $p->id }}" target="_blank"><i class="icon-base bx bx-file"></i></a></span>
            </td>
            
            <td>
              <div class="dropdown">
                <button
                  type="button"
                  class="btn p-0 dropdown-toggle hide-arrow"
                  data-bs-toggle="dropdown">
                  <i class="icon-base bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/cuti/pengajuan/edit/{{$p->id}}" wire:navigate><i class="icon-base bx bx-edit-alt me-1"></i>Edit</a>
                  <butt class="dropdown-item" wire:click="confirmDelete('{{ $p->id }}')"><i class="icon-base bx bx-trash me-1"></i>Delete</button>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>

    <nav aria-label="Page navigation " class="m-2">

      {{ $data->links() }}

    </nav>
  </div>
</div>