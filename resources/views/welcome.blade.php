@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bienvenido(a)</div>
                    <div class="card-body">
                       <div class="container">
                           <div class="row">
                               <div class="d-flex justify-content-center">
                                   <a href="/beneficiarios" class="btn btn-primary" type="button">
                                       Hacer una donación
                                   </a>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
