<!doctype html>
<html lang="en">
  <head>
    <title>Registration</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <form action="{{ $url }}" method="post">
              @csrf
          <h2 class="text-center">{{ $title }}</h2>
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="" value="{{$customer->name}}">
            <span class="text-danger">
                @error('name')
                    {{$message}}
                @enderror
            </span>
          </div>

          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="" value="{{$customer->email}}">
            <span class="text-danger">
                @error('email')
                    {{$message}}
                @enderror
            </span>
          </div>

          <div class="form-group">
            <label for="">Password</label>
            <input disabled type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="" value="{{$customer->password}}">
            <span class="text-danger">
                @error('password')
                    {{$message}}
                @enderror
            </span>
          </div>

          <button class="btn btn-primary">
            Update
          </button>
</form>
      </div>

    
  </body>
</html>