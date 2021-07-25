<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Laravel 8 CRUD Application</title>
      <link rel="stylesheet" href="{{ asset('css') }}/app.css">
      <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </head>
   <body>
      <div style="padding: 30px"></div>
      <div class="container">
         <div class="row">
            <div class="col-sm-8">
               <div class="card">
                  <div class="card-header">
                     All Students
                  </div>
                  @if (session('update'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>{{ session('update') }}</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  
                  @if (session('delete'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     <strong>{{ session('delete') }}</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                  <div class="card-body">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Roll</th>
                              <th scope="col">Class</th>
                              <th scope="col">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                            @php
                             $serial =1; 
                            @endphp
                            @foreach($students as $row)
                           <tr>
                              <th scope="row">{{$serial++}}</th>
                              <td>{{ $row->name }}</td>
                              <td>{{$row->roll}}</td>
                              <td>{{$row->class}}</td>
                              <td>
                                  <a href="{{url('student/edit/'.$row->id)}}" class="btn btn-sm btn-primary">Edit</a>

                                  <a href="{{url('student/destroy/'.$row->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger">Delete</a>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            
            
            <div class="col-sm-4">
               <div class="card">
                  <div class="card-header">
                     Add New Student
                  </div>
                  @if (session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>{{ session('success') }}</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                  <div class="card-body">
                     <form action="{{url('student/store')}}" method="POST">
                         @csrf
                        <div class="form-group">
                           <label for="exampleInputEmail1">Name</label>
                           <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                           @error('name')
                            <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">Roll</label>
                           <input type="roll" name="roll" class="form-control @error('roll') is-invalid @enderror" id="exampleInputPassword1" placeholder="Roll">
                           @error('roll')
                            <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">Class</label>
                           <input type="text" name="class" class="form-control @error('class') is-invalid @enderror" id="exampleInputPassword1" placeholder="Class">
                           @error('class')
                            <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>