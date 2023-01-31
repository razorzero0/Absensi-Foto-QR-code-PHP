
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" wire:model="nama">
              <label for="floatingInput">nama</label>
              </div>
              <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" wire:model="alamat">
              <label for="floatingInput">alamat</label>
              </div>
                  <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" wire:model="jenis_kelamin" name="inlineRadioOptions" id="inlineRadio1" value="Laki">
                  <label class="form-check-label" for="inlineRadio1">Laki Laki</label>
                  </div>
                  <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" wire:model="jenis_kelamin" name="inlineRadioOptions" id="inlineRadio2" value="perempuan">
                  <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                  </div>
              
              <div class="form-floating">
              <input type="password" class="form-control" id="floatingPassword" wire:model="password" placeholder="Password">
              <label for="floatingPassword">Password</label>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" wire:click="create" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>