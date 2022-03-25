<!doctype html>
<html lang="en">
  <head>
    <title>Customers Trash</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <h2 class="float-left">Customers</h2>
         <a href="{{ url('customer/view')}}"> <button class="btn btn-primary d-inline-block float-right ">View Customer</button> </a>
          <table class="table">
              <thead>
                  <tr>
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
                         <a href="{{ url('/customer/forcedelete/')}}/{{$customer->customer_id}}"> <button class="btn btn-danger">Delete</button> </a>
                          <a href="{{ route('customer.restore', ['id' => $customer->customer_id]) }}"> <button class="btn btn-success">Restore</button> </a>

                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
      </div>
    
  </body>
</html>