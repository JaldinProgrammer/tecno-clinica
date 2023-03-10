@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registro de llaves') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{(isset($table))? route('key.store', $table): route('key.store')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="key" class="col-md-4 col-form-label text-md-right">{{ __('llave') }}</label>
                                <div class="col-md-6">
                                    <input id="key" type="text" class="form-control @error('key') is-invalid @enderror" name="key" value="{{ old('key') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="disease_id" class="col-md-4 col-form-label text-md-right">{{ __('table') }}</label>
                                <div class="col-md-6">
                                    <select name="table_id" id="table_id">
                                        <option value="">--selecciona una tabla--</option>
                                        @foreach ($tables as $item)
                                            <option value="{{$item->id}}">{{$item->table}}</option>
                                        @endforeach
                                    </select>
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
