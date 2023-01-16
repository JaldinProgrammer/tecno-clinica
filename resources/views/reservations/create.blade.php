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
                    <div class="card-header">Registro de reservaciones</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reservation.store') }}">
                            @csrf
                            {{-- fecha --}}
                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">Fecha de la reservacion</label>
                                <div class="col-md-6">
                                    <input id="date" type="date"  class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}">
                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Hora --}}
                            <div class="form-group row">
                                <label for="time" class="col-md-4 col-form-label text-md-right">Hora</label>
                                <div class="col-md-6">
                                    <input id="time" type="time"  class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}">
                                    @error('time')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Descripcion</label>
                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}">
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
