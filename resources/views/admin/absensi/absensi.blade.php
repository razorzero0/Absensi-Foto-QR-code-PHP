
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Absen Masuk</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <style type="text/css">
            #results {}
            #a {width:100px;
                height:50px;
                margin-top: 50px;
                position:absolute;

                
            }
            
            
            #my_camera {
                margin-right:600px;
    transform: scaleX(-100%);
    
}
        </style>
    </head>
    
    <body class="bg-light">

  
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center ">
                            <div class="col-lg-4">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                    <div class="card-header bg-light"><h3 class="text-center text-dark font-weight-light ">Absensi</h3></div>
                              
                                    <div class="card-body">
                                        @if (session()->has('succes'))
                                        <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                                          {{ session('succes') }}
                                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                                        @if (session()->has('failed'))
                                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                          {{ session('failed') }}
                                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                                        @if($metod->foto == 1)
                                      <div class="text-center">
                               
                                        @error('image')
                                            <div class="alert alert-danger py-2">{{ $message }}</div>
                                            @enderror
                                      <h3 id="clock"></h3>
                                      </div>
                                   
                                      {{-- @if($presence[0]->updated_at->format('d') !== date('d') ) --}}
                                        <form action="/absensi/{{ $presence[0]->id }}" method="post" >
                                          @method('put')
                                          @csrf
                                           
                                            
                                            <div class=" d-flex  justify-content-center">

                                                <div id="my_camera"></div>
                                
                                                <br/>
                                
                                                <input  id="a" type=button value="Ambil Foto" onClick="take_snapshot()">
                             
                                                <input class="@error('image') is-invalid @enderror image-tag "  type="hidden" name="image" >
                                                
                                              
                                        
                                            
                                        
                                            <div id="r">
                                                <div id="results"></div>
                                            </div></div>
                                            <input value="{{ date('d') }}"  type="hidden" name="tgl" >
                                            <input type="hidden" value="{{ Carbon\Carbon::now() }}" name="alfa">
                                           <input value="{{ auth()->user()->id }}"  type="hidden" name="user_id" >
                                           <input value="{{ auth()->user()->nama }}"  type="hidden" name="nama" >
                                           <input value="{{ Carbon\Carbon::now()->translatedFormat('F') }}"  type="hidden" name="bulan" >
                                           
                                           <input value="1"  type="hidden" name="hadir" >
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit">Hadir</button>
                                              </form>
                                              
                                                <form action="/absensi/{{ $presence[0]->id }}" method="post">
                                                  @method('put')
                                          @csrf
                                          <input value="{{ date('d') }}"  type="hidden" name="tgl" >
                                          <input value="{{ Carbon\Carbon::now()->translatedFormat('F') }}"  type="hidden" name="bulan" >
                                                  <input value="{{ auth()->user()->id }}"  type="hidden" name="user_id" >
                                                  <input value="{{ auth()->user()->nama }}"  type="hidden" name="nama" >
                                                  <input value="1" type="hidden" name="sakit" >
                                                  <button class="btn btn-warning" type="submit">Sakit</button>
                                                </form>
                                            </div>
                                        
                                            {{-- @else
                                            <h4 class="text-center">Anda Sudah Absen</h4> --}}

                                            {{-- @endif --}}
                                        
                                    </div>
                                    
                                </div>
                                @else
                                {{-- @if($presence[0]->updated_at->format('d') !== date('d') ) --}}
                                <div class="text-center">
                                    <h3 id="clock"></h3>
                                    <form action="/qrcode-absensi" method="POST">
                                        @csrf
                                        <input value="{{ date('d') }}"  type="hidden" name="tgl" >
                                        <input type="hidden" value="{{ Carbon\Carbon::now() }}" name="alfa">
                                       <input value="{{ Carbon\Carbon::now()->translatedFormat('F') }}"  type="hidden" name="bulan" >
                                       
                                       <input value="1"  type="hidden" name="hadir" >
                                      <div class=" "id="reader" width="400px"></div>
                                      <input class="" id="result" type="hidden" name="user_id" >
                                      <button type="s" class="border-0" id="s"></button>
                                      </form>
                                </div>
                                {{-- @else
                                <h4 class="text-center">Anda Sudah Absen</h4> --}}

                                {{-- @endif --}}
                            
                                
                                @endif
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script >

function updateClock() {
    var currentTime = new Date();
    // Operating System Clock Hours for 12h clock
    var currentHoursAP = currentTime.getHours();
    // Operating System Clock Hours for 24h clock
    var currentHours = currentTime.getHours();
    // Operating System Clock Minutes
    var currentMinutes = currentTime.getMinutes();
    // Operating System Clock Seconds
    var currentSeconds = currentTime.getSeconds();
    // Adding 0 if Minutes & Seconds is More or Less than 10
    currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
    currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;
    // Picking "AM" or "PM" 12h clock if time is more or less than 12
    var timeOfDay = (currentHours < 12) ? "AM" : "PM";
    // transform clock to 12h version if needed
    currentHoursAP = (currentHours > 12) ? currentHours - 12 : currentHours;
    // transform clock to 12h version after mid night
    currentHoursAP = (currentHoursAP == 0) ? 12 : currentHoursAP;
    // display first 24h clock and after line break 12h version
    var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + "" 
    // print clock js in div #clock.
    $("#clock").html(currentTimeString);}
    $(document).ready(function () {
    setInterval(updateClock, 1000);
});
          </script>
          @if($metod->foto == 1)
          <script language="JavaScript">

            Webcam.set({
                
                
                width: 200,
        
                height: 150,
        
                image_format: 'jpeg',
        
                jpeg_quality: 90
        
            });
        
            
        
            Webcam.attach( '#my_camera' );
        
            
        
            function take_snapshot() {
        
                Webcam.snap( function(data_uri) {
        
                    $(".image-tag").val(data_uri);
        
                    document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        
                } );
        
            }
        
        </script>
        @endif

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

<script type="text/javascript">
  function onScanSuccess(decodedText, decodedResult) {
console.log(`Code matched = ${decodedText}`, decodedResult);
$("#result").val(decodedText)
$('#s').click();

// let id = decodedText;
// html5QrcodeScanner.clear().then(_ => {
//                     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//                     $.ajax({
                      
//                         url: "/qr",
//                         type: 'POST',            
//                         data: {
//                             _methode : "POST",
//                             _token: CSRF_TOKEN, 
//                             qr_code : id
//                         },            
//                         success: function (response) { 
//                             console.log(response);
//                             if(response.status == 200){
//                                 alert('berhasil');
//                             }else{
//                                 alert('gagal');
//                             }
                          
//                         }
//                     });   
//                 }).catch(error => {
//                     alert('something wrong');
//                 });
              
          
}

function onScanFailure(error) {
// handle scan failure, usually better to ignore and keep scanning.
// for example:
//   console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
"reader",
{ fps: 10, qrbox: {width: 250, height: 250} },
/* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
  </script>

<script language="JavaScript"> 
$(document).ready(function () {
  $('#dataTable').DataTable({
      order: [[3, 'desc']],
  });
})
</script>

    </body>
</html>
