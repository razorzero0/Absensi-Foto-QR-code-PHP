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
 
    
<div class="text-center mb-3">
    <h2>Daftar Gaji Pegawai Bulan </h2>
</div>
    <table class="table table-bordered">
      <thead class=" border bg-light text-center">
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
        
        @foreach($user as $m)
        <?php
        $a = $m->role_id
        ?>
       

<?php $p = $presence->where('user_id',$m->id)->first()->alfa?>

<?php
$r = $p * $denda[0]->jumlah_denda 
?>
<tr class="text-center">
            
    <th scope="row">{{ $loop->iteration }}</th>
    <td>{{ $m->nama }}</td>
    <td>{{ $role->find($a)->nama_jabatan }}</td>
    <td>Rp. {{ number_format($role->find($a)->gaji_pokok)}}</td>
    <td>Rp. {{ number_format($r)}}</td>
    <td>Rp. {{ number_format($role->find($a)->gaji_pokok-$r)}}</td>
    
  </tr>
  
@endforeach

</tbody>
</table>


      
</body>
</html>