@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Panel de beneficiario.</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            Hola, {{ $user->name }}
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="d-flex justify-content-center">
                                <span>
                                    <strong>$ {{ $user->monto_total }}</strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Donador</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->donaciones as $donadores)

                                        <tr>
                                            <td>{{ $donadores->nombre }}</td>
                                            <td>{{ $donadores->cantidad }}</td>
                                            <td>{{ $donadores->created_at }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
