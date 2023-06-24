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
  <h5 class="my-2">  Masukkan batas akhir keterlambatan misal (12:00) </h5>
  <div class="form ">
    <input class="form-input" name="batas_akhir" value="{{ $metod[0]['batas_akhir']  }}" placeholder="misal 12:00"  >
  
  </div>
  <button class="btn btn-primary mt-3">Pilih</button>
    </div>
</div>
</form>


    
{{-- @include('admin/member/modal') --}}

<!-- Modal -->

    
  </div>

  
  
@endsection