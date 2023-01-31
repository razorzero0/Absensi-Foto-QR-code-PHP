@extends('admin/layout/main')
@section('container')


<div class="container mt-5 "> 


<h3> List Denda</h3>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Denda
  </button>

<?php?>
<div class="container table-responsive py-3 px-0"> 
    <table class="table table-hover">
      <thead class="bg-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Jumlah Denda</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody>

        @foreach($dan as $d)
       
        <tr>
            
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $d->nama }}</td>
          <td>Rp. {{ number_format($d->jumlah_denda) }}</td>
          <td class="d-flex">
            <form action="/denda/{{ $d->id }}" method="post" >
                @method('delete')
                @csrf
            <button type="submit" class="btn btn-danger "> Hapus</button>
        </form>
        <form action="/denda/{{ $d->id }}" method="post">
            @method('put')
            @csrf
        <button type="button" class="btn btn-warning ms-3" data-bs-toggle="modal" data-bs-target="#update"> Update</button>
    </form>

        </td>
          
        </tr>
       
     @endforeach
      </tbody>
    </table>
    </div>
</div>
    
{{-- @include('admin/member/modal') --}}

@livewire('create-denda')
  
<script>

    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
@endsection