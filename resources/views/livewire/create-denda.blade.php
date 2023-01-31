
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/denda" method="post">
                @csrf
              <div class="form-floating mb-3">
              <input type="text" class="form-control" name="nama" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">nama</label>
              </div>
              <div class="form-floating mb-3">
              <input type="text" class="form-control" name="jumlah_denda" id="rupiah" placeholder="name@example.com">
              <label for="floatingInput">jumlah_denda</label>
              </div>
                 
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>

