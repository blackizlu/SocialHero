@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Panel de donaciones</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('exitoso'))
                                <div class="alert alert-success">
                                    {{ Session::get('exitoso') }}
                                </div>
                        @endif
                        <form method="POST" action="{{ route('beneficiarios.save') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="donador" class="col-md-4 col-form-label text-md-right">Nombre del donador</label>

                                <div class="col-md-6">
                                    <input id="donador" type="text" {{--class="form-control @error('email') is-invalid @enderror"--}} name="donador" value="{{ old('donador') }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Beneficiario</label>

                                <div class="col-md-6">
                                    <select class="custom-select custom-select-sm" id="usuarios" name="beneficiario_id">
                                        <option selected>Selecciona un beneficiario</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cantidad" class="col-md-4 col-form-label text-md-right">Cantidad a donar</label>
                                <div class="col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                        <div class="input-group-append">
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="cantidad">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Hacer donacion
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            var url = '{{route('api.beneficiarios')}}'
            $.ajax({url:url,
                    method:'get',

            }).done(function(response){
                var data = response.usuarios;
                $(data).each(function (item){
                    console.log(item)
                    $("#usuarios").append(`

                     <option value="${data[item].id}">${data[item].name}</option>
`)
                })
            })

            /*jQuery.get(url, function(response) {
                var data = response.beneficiarios;
                 $(data).each(function (item){
                     $("#usuarios").append(`

                     <option value="${item.id}">${item.name}</option>
`)
                 })
            })*/
        })
    </script>
    @endsection
