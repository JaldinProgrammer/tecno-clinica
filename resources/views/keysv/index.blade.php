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
        @can('admini')
         <a href="{{route('key.create')}}"><button type="button" class="btn btn-success btn-lg btn-block">Crear llave</button></a>
        @endcan
        <table class="table table-striped" id="table">
            <thead>
            <th>id</th>
            <th>key</th>
            <th>id_table</th>
            </thead>
            <tbody>
            @foreach ($keys as $item)
                <tr>
                    <!-- <td>{{$item->id}}</td> -->
                    <td>{{$item->key}}</td>
                    <td>{{$item->table->table}}</td>
                    @can('admin')
                        <td>
                            <a href="{{ route('key.delete', $item->id) }}"><button type="button" class="btn btn-danger">eliminar llave</button></a>
                        </td>
                    @endcan
                   
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

