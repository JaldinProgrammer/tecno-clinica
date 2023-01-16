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
    <div class="p-5" >
        <table class="table table-striped" id="table">
            <thead>
            <th>id</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Hora</th>
            @can('patient')
                <th>Doctor</th>
            @endcan
            @canany(['doctor','admin'])
                <th>Paciente</th>
                <th>Servicio</th>
            @endcanany
            </thead>
            <tbody>
            @foreach ($dates as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->date}}</td>
                    <td>{{$item->time}}</td>
                    @can('patient')
                        <td>{{$item->doctorName}}</td>
                    @endcan
                    @canany(['doctor','admin'])
                        <td>{{$item->patientName}}</td>
                        <td>
                            @if($item->diagnosticId ==  null)
                                <a href="{{ route('diagnostic.createFromDate',[ $item->patientId, $item->id]) }}"><button type="button" class="btn btn-success btn-lg btn-block">Diagnosticar</button></a>
                            @else
                                <h2>Cita concretada</h2>
                            @endif
                        </td>
                    @endcanany
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('js')
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        } );
    </script>
@endsection

