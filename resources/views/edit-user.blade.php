<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootsrap@5.2.0--beta1/dist/css/bootstrap.=0rBnVFBL6D0itfPri4tjHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
                <h2>EDIT USER</h2> 
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}

                </div>
                @endif
                <form method="post" action="{{url('edit-user')}}">
                    @csrf
                     <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="md-3">
                        <label class="form-lebel">Name</label>
                        <input type="text" class="form-control" name="name"
                        placeholder="Enter name" value="{{$data->name}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                        
                    </div>
                    @enderror
                    <br>
                    <div class="md-3">
                        <label class="form-lebel">Email</label>
                        <input type="text" class="form-control" name="email"
                        placeholder="Enter email" value="{{$data->email}}">
                    </div>
                    @error('email')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                        
                    </div>
                    @enderror
                    <br>
                    <button typre="submit" class="btn btn-primary">Submit</button>
                    <a href="{{url("dashboard")}}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div>
    
</body>
</html>