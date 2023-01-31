<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        {{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        </head>
    <body >
    <table id="dataTable" class="table table-bordered">
      <thead class="bg-light text-center">
        <tr>
          <th scope="col">#</th>
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


      
</body>
</html>
    



