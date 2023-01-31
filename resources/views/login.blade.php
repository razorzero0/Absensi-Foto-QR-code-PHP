<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-light">
    

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center ">
                            <div class="col-lg-4">
                                @if (session()->has('loginError'))
<div class="alert alert-warning alert-dismissible mt-2  fade show" role="alert">
  {{ session('loginError') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
                                <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                    <div class="card-header bg-primary"><h3 class="text-center text-light font-weight-light ">Login</h3></div>
                                    <div class="card-body">
                                        <form action="/login" method="post" >
                                            @csrf
                                            <div class="form-floating mb-3">
                                                
                                                    
                                                <div class="form-floating-start mb-3">
                                                    <label class="mb-2">Email :</label>
                                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"  placeholder="masukkan email">
                                                  </div>
                                              
                                                  @error('email')
                                                  <div class="alert alert-danger py-2">{{ $message }}</div>
                                                  @enderror
                                              
                                              
                                                  <div class="form-floating-start mb-4">
                                                    <label class="mb-2">Password :</label>
                                                    <input type="password" class="form-control" name="password" id="" placeholder="masukkan Password">
                                                    
                                                  </div>
                                              
                                                
                                                  <button class=" btn  btn-primary" type="submit">Login</button>
                                        </form>
                                    </div>
                                    {{-- <div class="card-footer text-center py-3 bg-primary">
                                       
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
