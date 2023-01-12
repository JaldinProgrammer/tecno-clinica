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
         <a href="{{route('promotion.create')}}"><button type="button" class="btn btn-success btn-lg btn-block">registrar promocion</button></a>
        @endcan
        <table class="table table-striped" id="table">
            <thead>
            <!-- <th>id</th> -->
            <th>title</th>
            <th>description</th>
            <th>from</th>
            <th>to</th>
            <!-- <th>status</th> -->
            </thead>
            <tbody>
            @foreach ($promotions as $item)
                <tr>
                    <!-- <td>{{$item->id}}</td> -->
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->from}}</td>
                    <td>{{$item->to}}</td>
                    <!-- <td>{{$item->status}}</td> -->

                    <!-- <td>{{$item->status}}</td> -->
                    @can('admin')
                        <td>
                            <a href="{{ route('promotion.delete', $item->id) }}"><button type="button" class="btn btn-danger">eliminar promocion</button></a>
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

