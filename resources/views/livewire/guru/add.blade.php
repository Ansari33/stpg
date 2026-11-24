@section('title', __('Permintaan Baru'))
<div>
    <div class="card mb-1">
        <h5 class="card-header">Tambah Data Guru</h5>
    </div>
    <div class="card p-4">  
      <form wire:submit.prevent="submit">
        @csrf
        <div class="mb-4 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Nama</label>
          <div class="col-md-10">
            <input name="nama" wire:model="nama" class="form-control" type="text" value="" id="html5-text-input" />
          </div>
        </div>
        <div class="mb-4 row">
          <label for="html5-search-input" class="col-md-2 col-form-label">NIP</label>
          <div class="col-md-10">
            <input name="nip" wire:model="nip" class="form-control" type="text" value="" id="html5-search-input" />
          </div>
        </div>
        <div class="mb-4 row">
          <label for="html5-email-input" class="col-md-2 col-form-label">Jenis Guru</label>
          <div class="col-md-10">
            <input name="jenis" wire:model="jenis" class="form-control" type="text" value="" id="html5-email-input" />
          </div>
        </div>
        <div class="mb-4 row">
          <label for="html5-url-input" class="col-md-2 col-form-label">Status ASN</label>
          <div class="col-md-10">
            <input name="status" wire:model="status_asn" class="form-control" type="text" value=""  />
          </div>
        </div>

        <div class="mb-4 row">
          <label for="html5-url-input" class="col-md-2 col-form-label">Penempatan</label>
          <div class="col-md-10">
            <input name="penempatan" wire:model="penempatan" class="form-control" type="text" value=""  />
          </div>
        </div>
        <div class="mb-4 row">
          <label for="html5-tel-input" class="col-md-2 col-form-label">Tunjangan</label>
          <div class="col-md-10">
            <input name="unit_kerja" wire:model="tunjangan" class="form-control" type="number" value="" id="html5-tel-input" />
          </div>
        </div>
        
        <button type="submit" class="btn me-2 btn-success">Simpan</button>
      </form>
    </div>
</div>
