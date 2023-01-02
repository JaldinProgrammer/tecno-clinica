<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>keys view</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
</head>
<body>
    
<div class="container">
<div class="row justify-content-center">
 <div class="col-md-6 col-md-offset-3">
 <h4>keys</h4>
    <hr>
    @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
    @endif

    <form action="storekey" method="post">
    @csrf 
     
        <div class="form-group">
            <label for=""> id exixting table</label>
            <input type="text" class="form-control" name="table_id" value= "{{old('table_id')}}">
            <span style="color:red">@error ('table_id'){{$message}} @enderror</span>
        </div>

        <div class="form-group">
            <label for=""> key</label>
            <input type="text" class="form-control" name="key" value= "{{old('key')}}">
            <span style="color:red">@error ('key'){{$message}} @enderror</span>
        </div>

        <div class="form-group">
            <label for=""> status</label>
            <input type="text" class="form-control" name="status"value= "{{old('status')}}">
            <span style="color:red">@error ('status'){{$message}} @enderror</span>

        </div>
        
        <hr>
        <div class="form-group">
            
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>

    <br>

    <table class="table table-hover">
        <thead>
            <th>id</th>
            <th>table_id</th>
            <th>key</th>
            <th>Status</th>
        </thead>

        <tbody>
            @foreach($list as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->table_id}}</td>
                <td>{{$item->key}}</td>
                <td>{{$item->status}}</td>
                <td>
                    <div class="btn-group">
                        <a href="deletekey/{{$item->id}}" class="btn btn-danger btn-xs">delete</a>
                        <a href="editkey/{{ $item->id}}" class="btn btn-primary btn-xs">edit</a>
                    </div>
                </td>
            </tr>
           
           @endforeach 
        </tbody>
    </table>

 </div>    
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>