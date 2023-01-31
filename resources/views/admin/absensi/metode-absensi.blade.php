@extends('admin/layout/main')
@section('container')

@if (session()->has('succes'))
<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
  {{ session('succes') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif









<div class="container table-responsive py-3 px-0"> 
  <h3 class="text-center">Absensi Setting</h3>
  <h5>Pilih Metode Absensi</h5>
  <div class="form-check ms-2 ">
    <form action="metode-absensi/{{ $metod[0]->id }}" method="post">
      @method('put')
      @csrf
      @if($metod[0]->foto == 1)
    <input class="form-check-input" value="1"type="radio" name="a" id="flexRadioDefault1" checked>
    <label class="form-check-label" for="flexRadioDefault1">
      foto
    </label>
  </div>
  <div class="form-check ms-2">
    <input class="form-check-input" value="2"type="radio" name="a" id="flexRadioDefault2" >
    <label class="form-check-label" for="flexRadioDefault2">
      qrcode
    </label>
  </div>
  @else
  <input class="form-check-input" value="1"type="radio" name="a" id="flexRadioDefault1" >
  <label class="form-check-label" for="flexRadioDefault1">
    foto
  </label>
</div>
<div class="form-check ms-2">
  <input class="form-check-input" value="2"type="radio" name="a" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    qrcode
  </label>
</div>


  @endif
  <button class="btn btn-primary mt-3">Pilih</button>
    </div>
</div>
</form>


    
{{-- @include('admin/member/modal') --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="list-member" method="post">
                @csrf
              <div class="form-floating mb-3">
              <input type="text" class="form-control" name="nama" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">nama</label>
              </div>
              <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">email</label>
              </div>
              <div class="form-floating mb-3">
              <input type="text" class="form-control" name="alamat" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">alamat</label>
              </div>
                  <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki">
                  <label class="form-check-label" for="inlineRadio1">Laki Laki</label>
                  </div>
                  <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan">
                  <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                  </div>
              
              <div class="form-floating">
              <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
              </div>
             
              <select class="form-select" name="role_id" aria-label="Default select example">
                <option selected>Jabatan</option>
                @foreach ($role as $r)
                <option value="{{ $r->id }}">{{ $r->nama_jabatan }}</option>
                @endforeach
              </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  
  
@endsection