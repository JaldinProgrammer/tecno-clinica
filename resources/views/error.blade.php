@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ERROR') }}</div>

                    <div class="card-body">
                        ERROR PAGINA NO ENCONTRADA
                    </div>
                    <h5 class="text-bg-danger">{{$e}}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
