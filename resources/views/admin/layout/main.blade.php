@include('admin/layout/header')
        @include('admin/layout/sidebar')
            <div id="layoutSidenav_content">
                <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
                    @yield('container')
                </main>
                
            </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('dist/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
    
 <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script> --}}
  

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


  <!--script for this page-->
 
    <script>
        jSuites.calendar(document.getElementById('calendar'), {
            type: 'year-month-picker',
            format: 'MMM-YYYY',
            validRange: [ '2020-02-01', '2022-12-31' ]
        });
        </script>

    </body>
</html>
