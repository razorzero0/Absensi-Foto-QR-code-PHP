@extends('admin/layout/main')
@section('container')





<div class="container mt-5 "> 

  @if($bulan || $tahun)
  <h3 class="text-center">Data Absensi Bulan {{ Carbon\Carbon::createFromFormat('m', $bulan)->translatedformat('F')}} {{ $tahun }}</h3>
  @else
  <h3 class="text-center">Data Absensi Bulan {{ Carbon\Carbon::now()->translatedformat('F')}} {{ date('Y') }}</h3>
  @endif
<form action="/absensi-bulanan" method="post">
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
$B = 2021
?>
<select class="form-control col-md-3 mt-3" name="tahun">
  <option readonly value="{{ date('Y') }}">-- Masukkan Tahun --</option>
@for($B;$B <= date('Y');$B++)
<option value="{{ $B }}">{{ $B }}</option>
@endfor
</select>
<div class="d-flex justify-content-between">
  <button class="btn btn-light border-dark mt-2" type="submit"> Tampilkan</button>
  <a href="/absensi-bulanan" class="btn btn-light border-dark d-flex mt-2"> Tampilkan Bulan ini</a>
</div>

  </div>
  </form>

<div class="container table-responsive py-3 px-0"> 
    <table class="table table-hover">
      <thead class="bg-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">nama</th>
          <th scope="col">Jabatan</th>
          <th scope="col">hadir</th>
          <th scope="col">sakit</th>
          <th scope="col">alfa</th>
          {{-- <th scope="col">action</th> --}}
        </tr>
      </thead>
      <tbody>
    
        @foreach($a as $k)
        <tr>
            
          <th scope="row">{{ $loop->iteration }}</th>
         

        
          <?php
          $i = $k->role_id
          ?>
          <td>{{ $k->nama }}</td>
          <td>{{ $jabatan->find($i)->nama_jabatan }}</td>
          <td>{{ $k->hadir }}</td>
          <td>{{ $k->sakit }}</td>
          <td>{{ $k->alfa }}</td>
          <form action="/kehadiran/{{ $k->id }}" method="post">
            @method('delete')
            @csrf
            
          {{-- <td><button type="submit" class="btn btn-danger"> Hapus</button></td> --}}
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
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/kehadiran" method="post">
                @csrf
              <div class="form-floating mb-3">
              
                <select name="user_id" class="form-select" aria-label="Default select example">
                  <option selected >Nama | Jabatan</option>
                   @foreach ($user as $u)
                   <?php
                 $r = $u->role_id
                  ?>
  
                 
              <option value="{{ $u->id }}">{{ $u->nama}} | {{ $jabatan->find($r)->nama_jabatan}}</option>
        
              @endforeach
                </select>
                <select class="form-control mt-3" name="bulan">
                  <option value="{{ Carbon\Carbon::now()->translatedFormat('F') }}" readonly>{{ Carbon\Carbon::now()->translatedFormat('F') }}</option>
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