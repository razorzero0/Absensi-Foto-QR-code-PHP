@extends('admin/layout/main')
@section('container')


<div class="container mt-5 "> 

<form action="/laporan-harian" method="post">
  @csrf
  @if($filter)
<input type="date" value="{{ $filter }}" name="filter" class="col-md-3 px-0" >
@else
<input type="date" name="filter" class="col-md-3 px-0" >
@endif
<div class="d-flex justify-content-between">
  <button class="btn btn-light border-dark mt-2" type="submit"> Tampilkan</button>
  <a href="/daily_absensi" class="btn btn-light border-dark d-flex mt-2"> Tampilkan Semua</a>
</div>

  </div>
  </form>
  
<div class="container table-responsive py-3 "> 
    <table id="dataTable" class="table table-bordered">
      <thead class="bg-light text-center">
        
        <tr>
          <th scope="col">#</th>
          <th scope="col">image</th>
          <th scope="col">Waktu Masuk</th>
          <th scope="col">Waktu Keluar</th>
          <th scope="col">Nama</th>
          <th scope="col">Status</th>
          
         
        </tr>
      </thead>
      <tbody>
        
       <?php
       
   
        ?>
        @foreach($daily as $d)
      
        <tr class="text-center ">
            
          <th scope="row">{{ $loop->iteration }}</th>
          <td>
            @if($d->image)
            <img height="50px"src="{{ asset('storage/daily/'.$d->absen_image)}}">
          </td>
          @else
          <span>Tidak ada foto</span>
        @endif
          <td>{{ $d->created_at }}</td>
          @if($d->keluar == 0)
          <td>belum absen</td>
          @else
          <td>{{ $d->keluar }}</td>
          @endif
          <td>{{ $d->nama }}</td>
          @if($d->status == "hadir")
          <td  class="d-flex justify-content-center "><button class=" d-flex px-4  btn btn-primary "> {{ $d->status }}</button></td>
          @elseif($d->status == "sakit")
          <td  class="d-flex justify-content-center "><button class=" d-flex px-4  btn btn-warning "> {{ $d->status }}</button></td>
          @else
          <td  class="d-flex justify-content-center "><button class=" d-flex px-4  btn btn-danger text-light"> telat</button></td>
          @endif
          
        </tr>
       
     @endforeach
      </tbody>
      
    </table>
    <form action="/la" method="post" > 
  <input type="hidden" value="{{ $filter }}" name="tgl">
      @csrf
      
      <button type="submit" class="btn btn-warning text-light" >Cetak Excel</button>
    
    </form>
    </div>
</div>
    



@endsection