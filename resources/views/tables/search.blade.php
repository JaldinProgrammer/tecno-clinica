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
            <th>Coincidencia</th>
            <th>Vista</th>
            <th>Link</th>
            </thead>
            <tbody>
            @foreach ($results as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->key}}</td>
                    <td>{{$item->table}}</td>
                    <td>
{{--                        go for true in case that we require ID to render view--}}
                        @if($item->usingId == 1)
                            <a href="{{ route($item->route, Auth::user()->id) }}"><button type="button" class="btn btn-danger">Ir a pagina</button></a>
                        @else
                            <a href="{{ route($item->route) }}"><button type="button" class="btn btn-danger">Ir a pagina</button></a>
                        @endif
                    </td>
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

