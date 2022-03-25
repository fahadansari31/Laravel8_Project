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
          <form action="{{ $url }}" method="post" enctype="multipart/form-data">
              @csrf
          <h2 class="text-center">{{ $title }}</h2>
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="" value="{{old('name')}}">
            <span class="text-danger">
                @error('name')
                    {{$message}}
                @enderror
            </span>
          </div>

          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="" value="{{old('email')}}">
            <span class="text-danger">
                @error('email')
                    {{$message}}
                @enderror
            </span>
          </div>

          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
            <span class="text-danger">
                @error('password')
                    {{$message}}
                @enderror
            </span>
          </div>

          <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="" aria-describedby="helpId" placeholder="">
            <span class="text-danger">
                @error('password_confirmation')
                    {{$message}}
                @enderror
            </span>
          </div>

          <div class="form-group">
            <label for="">Upload Profile</label>
            <input type="file" class="form-control" name="profile_pic" id="" aria-describedby="helpId" placeholder="">
            <span class="text-danger">
                @error('profile_pic')
                    {{$message}}
                @enderror
            </span>
          </div>

          <button class="btn btn-primary">
            Submit
          </button>
</form>
      </div>

    
  </body>
</html>