@extends('admin/layout/main')
@section('container')


                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard Admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Welcome {{ auth()->user()->nama }}</li>
                        </ol>
                       
                    </div>
              

@endsection