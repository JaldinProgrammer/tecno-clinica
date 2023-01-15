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
        @can('patient')
            <a href="{{route('reservation.create')}}"><button type="button" class="btn btn-success btn-lg btn-block">Crear reservacion</button></a>
        @endcan
        <table class="table table-striped" id="table">
            <thead>
            <th>id</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Servicios</th>
            </thead>
            <tbody>
            @foreach ($reservations as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->date}}</td>
                    <td>{{$item->time}}</td>
                    @can('patient')
                        <td>
                            <a href="{{ route('reservation.delete', $item->id) }}"><button type="button" class="btn btn-danger">Dar de baja</button></a>
                        </td>
                    @endcan
                    @canany(['admin', 'doctor'])
                        <td>
                            <a href="{{ route('date.create', $item->id) }}"><button type="button" class="btn btn-success">Aceptar la reservacion</button></a>
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

