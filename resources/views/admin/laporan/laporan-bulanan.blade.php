@extends('admin/layout/main')
@section('container')


<div class="container mt-5 "> 
  @if($bulan || $tahun)
  <h3 class="text-center">Data Absensi Bulan {{ Carbon\Carbon::createFromFormat('m', $bulan)->translatedformat('F')}} {{ $tahun }}</h3>
  @else
  <h3 class="text-center">Data Absensi Bulan {{ Carbon\Carbon::now()->translatedformat('F')}} {{ date('Y') }}</h3>
  @endif
<form action="/laporan-bulanan" method="post">
  @csrf
  <select class="form-control col-md-3 mt-3" name="bulan">
    <option readonly value="{{ date('m') }}"selected>-- Masukkan Bulan --</option>
    <option value="01" >January</option>
    <option value="02">February</option>
    <option value="03">March</option>
    <option value="04">April</option>
    <option value="05">May</option>
    <option value="06">June</option>
    <option value="07">July</option>
    <option value="08">August</option>
    <option value="09">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
  </select>
<?php
$a = 2021
?>
<select class="form-control col-md-3 mt-3" name="tahun">
  <option readonly value="{{ date('Y') }}">-- Masukkan Tahun --</option>
@for($a;$a <= date('Y');$a++)
<option value="{{ $a }}">{{ $a }}</option>
@endfor
</select>
<div class="d-flex justify-content-between">
  <button class="btn btn-light border-dark mt-2" type="submit"> Tampilkan</button>
  <a href="/laporan-bulanan" class="btn btn-light border-dark d-flex mt-2"> Tampilkan Semua</a>
</div>

  </div>
  </form>
<div class="container table-responsive py-3 "> 
    <table id="dataTable" class="table table-bordered">
      <thead class="bg-light text-center">
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">Jabatan</th>
          <th scope="col">image</th>
          <th scope="col">Waktu Masuk</th>
          <th scope="col">Waktu Keluar</th>
          
          <th scope="col">Status</th>
          
         
        </tr>
      </thead>
      <tbody>
        
       
        @foreach($daily as $d)
      
        <tr class="text-center ">
            
          <td>{{ $d->nama }}</td>
          <td>{{ $d->jabatan }}</td>
          <td>
            @if($d->image)
            <img height="50px"src="{{ asset('storage/daily/'.$d->image)}}">
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
    <form action="/cetak-bulan" method="post" > 

      @csrf
      
      <button type="submit" class="btn btn-warning text-light" >Cetak Excel</button>
    
    </form>
    </div>
</div>

    



@endsection