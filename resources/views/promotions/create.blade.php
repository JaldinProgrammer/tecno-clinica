@extends('layouts.app')

@section('content')
    @if ($errors->count() > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registro de promociones</div>
                    @dump($errors->all())
                    <div class="card-body">
                        <form method="POST" action="{{ route('promotion.store') }}">
                            @csrf
                           
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">titulo promocion</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ old('title') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">descripcion de la promocion</label>
                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}">
                                </div>
                            </div>

                            <!-- {{-- fechaini --}} -->
                            <div class="form-group row">
                                <label for="dateini" class="col-md-4 col-form-label text-md-right">Fecha de inicio de la promocion</label>
                                <div class="col-md-6">
                                    <input id="dateini" type="date"  class="form-control @error('dateini') is-invalid @enderror" name="dateini" value="{{ old('dateini') }}">
                                    @error('dateini')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- {{-- fechafin --}} -->
                            <div class="form-group row">
                                <label for="datefin" class="col-md-4 col-form-label text-md-right">Fecha de fin de la promocion</label>
                                <div class="col-md-6">
                                    <input id="datefin" type="date"  class="form-control @error('datefin') is-invalid @enderror" name="datefin" value="{{ old('dateini') }}">
                                    @error('datefin')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
{{--                            @dump($user)--}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
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
