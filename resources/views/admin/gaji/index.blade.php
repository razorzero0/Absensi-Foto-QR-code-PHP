@extends('admin/layout/main')
@section('container')


<div class="container mt-5 "> 

<h3> Data Gaji Karyawaan</h3>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Member
  </button>


<div class="container table-responsive py-3 px-0"> 
    <table class="table table-hover">
      <thead class="bg-light text-center">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">jabatan</th>
          <th scope="col">Gaji Pokok</th>
          <th scope="col">Potongan</th>
          <th scope="col">Total gaji</th>
          
          
        </tr>
      </thead>
      <tbody>
       
        @foreach($salary as $s)
        
      
        <tr class="text-center">
            
          <th scope="row">{{ $loop->iteration }}</th>
          <td class="">{{ $s->nama }}</td>
          <td>{{ $s->jabatan}}</td>
          <td>Rp. {{ number_format($s->gaji_pokok)}}</td>
          <td>Rp. {{ number_format($s->potongan)}}</td>
          <td>Rp. {{ number_format($s->total)}}</td>
          
          
        </tr>
        
     @endforeach
    
      </tbody>
    </table>
    <a href="/gaji-pdf" class="btn btn-warning" target="_blank">Cetak Pdf</a>
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