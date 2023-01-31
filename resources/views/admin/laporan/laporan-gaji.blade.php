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
    <a href="laporan-gajiExport" class="btn btn-primary">Cetak Excel</a>
    </div>
</div>
@endsection