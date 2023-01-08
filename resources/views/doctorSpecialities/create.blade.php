@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registro de especialidades de doctor') }}</div>

                    <div class="card-body">
                        <!-- <form method="POST" action="{{(isset($users,$specialities))?  route('doctorSpeciality.store', $users, $specialities): route('doctorSpeciality.store')}}"> -->
                       <form method="POST" action="{{ route('doctorSpeciality.store') }}">  
                        @csrf
                           

                            <div class="form-group row">
                                <label for="doctor_id" class="col-md-4 col-form-label text-md-right">doctor</label>
                                <div class="col-md-6">
                                    <select name="doctor_id" id="doctor_id">
                                        <option value="">--selecciona un doctor--</option>
                                        @foreach ($users as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="speciality_id" class="col-md-4 col-form-label text-md-right">especialidad</label>
                                <div class="col-md-6">
                                    <select name="speciality_id" id="speciality_id">
                                        <option value="">--selecciona una especialidad--</option>
                                        @foreach ($specialities as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
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

                        <!-- </form> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
