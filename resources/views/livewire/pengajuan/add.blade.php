@section('title', __('Pengajuan TPG Baru'))
<div>
    <div class="card mb-1">
        <h5 class="card-header">Tambah Pengajuan</h5>
    </div>
    <div class="card p-4">  
      <form wire:submit.prevent="submit">
        @csrf
        <div class="mb-4 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Nama</label>
          <div class="col-md-10">
            <select  name="pengaju" wire:model="pengaju" require class="form-select " id="exampleFormControlSelect1" aria-label="Default select example">
              <option selected>Pilihan Guru</option>
              @foreach($guru as $gr => $pg)
              <option value="{{ $pg->nip }}">{{ $pg->nama }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="mb-4 row">
          <label for="html5-tel-input" class="col-md-2 col-form-label">Nomor Manual</label>
          <div class="col-md-10">
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" wire:model.live="ismanual" 
              type="checkbox" 
              id="flexSwitchCheckChecked" >
              <input class="form-control" wire:model="manual" type="number" {{ $ismanual ? " " : "disabled" }}  />
            </div>
          </div>
          <!-- <div class="col-md-9">
            <div class="form-check form-switch mb-2">
              <input class="form-control" type="text" >
            </div>
          </div> -->
        </div>

        

        <div class="mb-4 row">
          <label for="html5-tel-input" class="col-md-2 col-form-label">Bulan</label>
          <div class="col-md-10">
            <input name="bulan" wire:model="bulan" class="form-control" type="number" max="12" min="1" required />
          </div>
        </div>
       
        <div class="mb-4 row">
          <label for="html5-email-input" class="col-md-2 col-form-label">Tahun</label>
          <div class="col-md-10">
            <input name="tahun" wire:model="tahun" class="form-control" type="number" value="" id="html5-email-input" required />
          </div>
        </div>
        
        <div class="mb-4 row">
          <div class="col-md-3">
            <button type="submit" @if($disabled == 1) disabled @endif class="btn me-2 btn-success">Simpan</button>
          </div>
          
          
        </div>
        
      </form>
    </div>
</div>
