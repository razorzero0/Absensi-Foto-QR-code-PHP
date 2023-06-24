@extends('admin/layout/main')
@section('container')


<div class="container mt-5 "> 
  @if (session()->has('succes'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('succes') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if (session()->has('failed'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('failed') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

<h3> List Member</h3>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Member
  </button>


<div class="container table-responsive py-3 px-0"> 
    <table class="table table-hover">
      <thead class="bg-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">alamat</th>
          <th scope="col">jabatan</th>
          <th scope="col">qr code</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach($member as $m)
        <tr>
            
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $m->nama }}</td>
          <td>{{ $m->jenis_kelamin }}</td>
          <td>{{ $m->alamat }}</td>
          <?php
          $a = $m->role_id
          ?>
          <td>{{ $role->find($a)->nama_jabatan }}</td>
          <td><a href="generate/{{ $m->id  }}" class="btn btn-primary">Generate</a></td>
          <form action="/list-member/{{ $m->id }}" method="post">
            @method('delete')
            @csrf
            
          <td><button type="submit" class="btn btn-danger"> Hapus</button></td>
          </form>
        </tr>
        
     @endforeach
      </tbody>
    </table>
   
    </div>
</div>


    
{{-- @include('admin/member/modal') --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="list-member" method="post">
                @csrf
              <div class="form-floating mb-3">
              <input type="text" class="form-control" name="nama" id="floatingInput" >
              <label for="floatingInput">nama</label>
              </div>
              <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email" id="floatingInput" >
              <label for="floatingInput">email</label>
              </div>
              <div class="form-floating mb-3">
              <input type="text" class="form-control" name="alamat" id="floatingInput" >
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