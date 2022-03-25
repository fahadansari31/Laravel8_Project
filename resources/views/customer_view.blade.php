<!doctype html>
<html lang="en">
  <head>
    <title>Customers</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                        @elseif(session('delete'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('delete') }}
                        </div>
                    @endif
          <h2 class="text-center">Customers</h2><br>
          <div class="row m-2">
            <form action="" class="col-9">
              <div class="form-group">
                <input type="search" class="form-control" name="search" placeholder="Search by name or email"><br>
                <a href="{{ url('/customer/view') }}"><button class="btn btn-secondary">Reset</button></a>
              </div>
            </form>

          <div class="col-3">
         <a href="{{ route('customer.view')}}"> <button class="btn btn-primary d-inline-block ml-3 float-right ">+Add</button> </a>&nbsp;&nbsp;&nbsp; 
         <a href="{{ route('customer.trash')}}"> <button class="btn btn-danger d-inline-block ml-3 float-right ">Go To Trash</button> </a>
       </div>
      </div>

          <table class="table">

              <thead>
                  <tr>
                    <th>Profile</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Created_at</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($customers as $customer) 
                  <tr>
                    <td><img src="{{ asset('storage/uploads/'. $customer->image) }}" width="50" height="50" /></td>
                      <td>{{ $customer->name }}</td>
                      <td>{{ $customer->email }}</td>
                      <td>
                          @if($customer->status == 1)

                                    <span class="badge badge-success">Active</span>
 
                            @else
                            <span class="badge badge-danger">Inactive</span>
                          @endif
                        </td>
                        <!-- Pass parameters of date & format to app/helper.php -->
                      <td>{{ get_formatted_date($customer->created_at, 'd-M-Y') }}</td>
                      <td>
                         <a href="{{ url('/customer/delete/')}}/{{$customer->customer_id}}"> <button class="btn btn-danger">Trash</button> </a>
                          <a href="{{ route('customer.edit', ['id' => $customer->customer_id]) }}"> <button class="btn btn-success">Edit</button> </a>

                      </td>
                  </tr>
                @endforeach
              </tbody>
              
          </table>

          <div class="row">
            {{$customers->links('pagination::bootstrap-4')}}  
          </div>
      </div>
    
  </body>
</html>
