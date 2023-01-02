<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>specialities view</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
</head>
<body>
    
<div class="container">
<div class="row justify-content-center">
 <div class="col-md-6 col-md-offset-3">
    <h4>{{$Title}} | specialities</h4>
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

    <form action="{{route('update')}}" method="post">
    @csrf 
        <input type="hidden" name="cid" value="{{ $Info->id }}">
     
        <div class="form-group">
            <label for=""> name</label>
            <input type="text" class="form-control" name="name" value= "{{$Info->name}}">
            <span style="color:red">@error ('name'){{$message}} @enderror</span>
        </div>

        <div class="form-group">
            <label for=""> status</label>
            <input type="text" class="form-control" name="status"value= "{{$Info->status}}">
            <span style="color:red">@error ('status'){{$message}} @enderror</span>

        </div>
        
        <hr>
        <div class="form-group">
            
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>

    <br>

   

 </div>    
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>