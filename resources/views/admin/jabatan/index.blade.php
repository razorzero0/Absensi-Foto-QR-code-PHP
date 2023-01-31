@extends('admin/layout/main')
@section('container')


<div class="container mt-5 "> 


<h3> Data Jabatan</h3>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Jabatan
  </button>


<div class="container table-responsive py-3 px-0"> 
    <table class="table table-hover">
      <thead class="bg-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">gaji pokok</th>
  
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($jabatan as $j)
        
        <tr>
            
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $j->nama_jabatan }}</td>
          <td>Rp. {{ number_format($j->gaji_pokok) }}</td>
          <form action="/jabatan/{{ $j->id }}" method="post">
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
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/jabatan" method="post">
                @csrf
              <div class="form-floating mb-3">
              <input type="text" class="form-control" name="nama_jabatan" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">nama</label>
              </div>
              <div class="form-floating mb-3">
              <input type="text" class="form-control" name="gaji_pokok" id="rupiah" placeholder="name@example.com">
              <label for="floatingInput">Gaji pokok</label>
              </div>
             
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>


  <script>

    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('rupiah');
    var dengan_rupiah1 = document.getElementById('rupiah1');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');

    });

    dengan_rupiah1.addEventListener('keyup', function(e)
    {
        dengan_rupiah1.value = formatRupiah(this.value, 'Rp. ');
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