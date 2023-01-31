@extends('admin/layout/main')
@section('container')


<div class="container mt-5 "> 

  @if($bulan || $tahun)
  <h3 class="text-center">Data Absensi Bulan {{ Carbon\Carbon::createFromFormat('m', $bulan)->translatedformat('F')}} {{ $tahun }}</h3>
  @else
  <h3 class="text-center">Data Absensi Bulan {{ Carbon\Carbon::now()->translatedformat('F')}} {{ date('Y') }}</h3>
  @endif
<form action="/rekap-bulanan" method="post">
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
$b = 2021
?>
<select class="form-control col-md-3 mt-3" name="tahun">
  <option readonly value="{{ date('Y') }}">-- Masukkan Tahun --</option>
@for($b;$b <= date('Y');$b++)
<option value="{{ $b }}">{{ $b }}</option>
@endfor
</select>
<div class="d-flex justify-content-between">
  <button class="btn btn-light border-dark mt-2" type="submit"> Tampilkan</button>
  <a href="/rekap-bulanan" class="btn btn-light border-dark d-flex mt-2"> Tampilkan Bulan Ini</a>
</div>

  </div>
  </form>

<div class="container table-responsive py-3 px-0"> 
    <table class="table table-hover">
      <thead class="bg-light">
        <tr>
       
          <th scope="col">nama</th>
          <th scope="col">Jabatan</th>
          <th scope="col">hadir</th>
          <th scope="col">sakit</th>
          <th scope="col">alfa</th>
        </tr>
      </thead>
      <tbody>
    
        @foreach($a as $k)
        <tr>
          <th>{{ $k->nama }}</th>
          <td>{{ $k->jabatan }}</td>
          <td>{{ $k->hadir }}</td>
          <td>{{ $k->sakit }}</td>
          <td>{{ $k->alfa }}</td>
          
        </tr>
        
     @endforeach 
      </tbody>
    </table>
    @if($bulan && $tahun)
    <form action="/cetak-bulan" method="post" > 
        <input type="hidden" value="{{ $bulan }}" name="bulan">
        <input type="hidden" value="{{ $tahun }}" name="tahun">
        @csrf
        
        <button type="submit" class="btn btn-warning text-light" >Cetak Excel</button>
      
      </form>
      @else
      <form action="/cetak-bulan" method="post" > 
        <input type="hidden" value="{{ date('m') }}" name="bulan">
        <input type="hidden" value="{{ date('Y') }}" name="tahun">
        @csrf
        
        <button type="submit" class="btn btn-warning text-light" >Cetak Excel</button>
      
      </form>
      @endif
    </div>
</div>
</div>
{{-- @include('admin/member/modal') --}}


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