@section('title', __('Edit Data Guru'))
<div>
    <div class="card mb-1">
        <h5 class="card-header">Update Data Guru</h5>
    </div>
    <div class="card p-4"> 
      <form  wire:submit.prevent="update">
        
        <div class="mb-4 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Nama</label>
          <div class="col-md-10">
            <input name="nama" wire:model="nama" class="form-control" type="text"   id="html5-text-input" />
          </div>
        </div>

        <div class="mb-4 row">
          <label for="html5-search-input" class="col-md-2 col-form-label">NIP</label>
          <div class="col-md-10">
            <input name="nip" wire:model="nip" class="form-control"   id="html5-search-input" />
          </div>
        </div>
        <div class="mb-4 row">
          <label for="html5-email-input" class="col-md-2 col-form-label">Jenis Guru</label>
          <div class="col-md-10">
            <input class="form-control" wire:model="jenis" type="text"  id="html5-email-input" />
          </div>
        </div>
        <div class="mb-4 row">
          <label for="html5-url-input" class="col-md-2 col-form-label">Status ASN</label>
          <div class="col-md-10">
            <input class="form-control" type="text" wire:model="status_asn"  id="html5-url-input" />
          </div>
        </div>
        <div class="mb-4 row">
          <label for="html5-tel-input" class="col-md-2 col-form-label">Penempatan</label>
          <div class="col-md-10">
            <input class="form-control" type="text" wire:model="penempatan"  id="html5-tel-input" />
          </div>
        </div>
        <div class="mb-4 row">
          <label for="html5-tel-input" class="col-md-2 col-form-label">Tunjangan</label>
          <div class="col-md-10">
            <input class="form-control" type="number" wire:model="tunjangan"  id="html5-tel-input" />
          </div>
        </div>
       
        <button type="submit" class="btn  me-2 btn-warning">Update</button>
      </form>
    </div>
</div>
