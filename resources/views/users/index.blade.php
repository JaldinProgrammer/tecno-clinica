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
            <th class="prueba">id</th>
            <th class="prueba">Nombre</th>
            <th>Celular</th>
            <th>Identificacion</th>
            <th>Servicios</th>
            </thead>
            <tbody>
            @foreach ($users as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->cellphone}}</td>
                    <td>{{$item->ci}}</td>
                    <td>
                        <a href="{{ route('diagnostic.create', $item->id) }}"><button type="button" class="btn btn-success btn-lg btn-block">Crear diagnostico</button></a>
                    </td>
                    <td>
                    @if($item->is_doctor==1)
                    <td>
                        <a href="{{ route('doctorSpeciality.create', $item->id) }}"><button type="button" class="btn btn-success btn-lg btn-block">guardar nueva especialidad</button></a>
                    </td>
                    @endif
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

