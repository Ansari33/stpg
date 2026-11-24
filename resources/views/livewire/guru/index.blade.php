@section('title', __('Guru'))
<div>
  <div class="card">
    <div class="row">
      <div class="col-lg-8">
        <h5 class="card-header">Daftar Guru</h5>
      </div>
      {{-- 
      <div class="col-lg-1 mt-5">
        <a class="btn btn-success ml-4" href="{{ route('guru.import') }}" wire:navigate>{{ __('import') }}</a>
      </div>
      --}}
      <div class="col-lg-3 mt-5">
        
        <input placeholser="cari..." wire:model="search" class="form-control" wire:keydown="searchData" />
      </div>
      <div class="col-lg-1 mt-5">
        <a class="btn btn-primary ml-4" href="{{ route('guru.add') }}" wire:navigate>{{ __('Baru') }}</a>
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
            <th>Nama</th>
            <th>NIP</th>
            <th>Jenis</th>
            <th>ASN</th>
            <th>Tunjangan</th>
            <th>Actions</th>
          </tr>
          
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($data as $perm => $p )
          <tr>
            <td>
              <i class="icon-base fab fa-angular text-danger me-4"></i>
              <span class="fw-medium">{{ $p->nama }}</span>
            </td>
            <td>{{ $p->nip }}</td>
            <td>
              {{ $p->jenis }}
            </td>
            <td>
              <span class="">{{ $p->status_asn }}</span>
            </td>
            <td><span class="">Rp.{{ number_format($p->tunjangan, 0, ',', '.') }}</span></td>
            <td>
              <div class="dropdown">
                <button
                  type="button"
                  class="btn p-0 dropdown-toggle hide-arrow"
                  data-bs-toggle="dropdown">
                  <i class="icon-base bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/guru/edit/{{$p->nip}}" wire:navigate><i class="icon-base bx bx-edit-alt me-1"></i>Edit</a>
                  <butt class="dropdown-item" wire:click="confirmDelete('{{ $p->nama }}')"><i class="icon-base bx bx-trash me-1"></i>Delete</button>
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