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
                    <div class="card-header">Agendar cita</div>
                    <h3>{{ $reservation->description }}</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('date.store') }}">
                            @csrf
                            {{-- fecha --}}
                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">Fecha de la reservacion</label>
                                <div class="col-md-6">
                                    <input id="date" type="date"  class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $reservation->date }}">
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
                                    <input id="time" type="time"  class="form-control @error('time') is-invalid @enderror" name="time" value="{{ $reservation->time }}">
                                    @error('time')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="reservation_id" value="{{$reservation->id}}">
                            <input type="hidden" name="description" value="{{$reservation->description}}">
                            <input type="hidden" name="date" value="{{$reservation->date}}">
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
