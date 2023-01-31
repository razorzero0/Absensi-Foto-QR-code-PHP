@extends('admin/layout/main')
@section('container')





<div class="container mt-5 d-flex justify-content-center "> 
  <div class="card d-flex  text-center" style="width: 24rem; ">

    <form action="/profile-image/{{ auth()->user()->id }}" method="post" enctype="multipart/form-data">
     
      @csrf
      <label for="fileToUpload">
    <div class="profile-pic" style="background-image: url('storage/{{ auth()->user()->image }}')">
        <span class="glyphicon glyphicon-camera"></span>
        <span>Change Image</span>
    </div>
    </label>
    <input type="File" class="@error('image') is-invalid @enderror"name="image" id="fileToUpload">
    
      @error('image')
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @enderror
      <div class="d-flex justify-content-center">
    <button type="submit "class="btn btn-success d-block text-light" name="image" >Update Foto</button>
    </div>
  </form>
    
    <div class="card-body">
      <h5 class="card-title">{{ $user[0]->nama }}</h5>
     <span>{{ $user[0]->nama_jabatan }}</span>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">{{ $user[0]->email }}</li>
      <li class="list-group-item">{{ $user[0]->jenis_kelamin }}</li>
      <li class="list-group-item">{{ $user[0]->alamat }}</li>
    </ul>
    <div class="card-body d-flex justify-content-between">
      <button href="#" class="btn btn-warning text-light"data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
      <button href="#" class="btn btn-primary text-light">Cetak</button>
    </div>
  </div>
</div>


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
            <form action="/profile/{{ auth()->user()->id }}" method="post">
              @method('put')
                @csrf
                <div class="form-floating mb-3">
                  <input value="{{ $user[0]->nama }}"  type="text" class="form-control" name="nama" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">nama</label>
                  </div>
              <div class="form-floating mb-3">
                
                <select name="role" class="form-select" aria-label="Default select example">
                
                   @foreach ($role as $r)
                  @if($r->id == $user[0]->role_id)
              <option selected value="{{ $r->id }}">{{ $r->nama_jabatan}}</option>
              @else
              <option value="{{ $r->id }}">{{ $r->nama_jabatan}}</option>
              @endif
        
              @endforeach
                </select>
              </div>
                <div class="form-floating mb-3">
                  <input value="{{ $user[0]->email }}" type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">email</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input value="{{ $user[0]->alamat }}" type="text" class="form-control" name="alamat" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">alamat</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input value="{{ $user[0]->jenis_kelamin }}" type="text" class="form-control" name="jenis_kelamin" id="floatingInput" placeholder="name@example.com">
                      <label for="floatingInput">jenis_kelamin</label>
                      </div>
                
                
                  
                
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

{{-- <select class="form-control mt-3" name="bulan">
  <option value="January" selected="">January</option>
  <option value="February">February</option>
  <option value="March">March</option>
  <option value="April">April</option>
  <option value="May">May</option>
  <option value="June">June</option>
  <option value="July">July</option>
  <option value="August">August</option>
  <option value="September">September</option>
  <option value="October">October</option>
  <option value="November">November</option>
  <option value="December">December</option>
</select> --}}