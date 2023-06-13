@extends('admin.layouts.app')
@section('title','Edit User')
@section('content')
    <h1>Edit User</h1>
    <div>
        <form action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
    

        <div class="input-group input-group-static mb-4">
            <label>Name</label>
            <input type="text" name="name" class="form-control"  value="{{old('name') ?? $user->name}}">
            @error('name')
                <span class="text-danger">{{ $message}}</span>
            @enderror
        </div>
        <div class="input-group input-group-static mb-4">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{old('email') ?? $user->email}}">
            @error('email')
                <span class="text-danger">{{ $message}}</span>
            @enderror
        </div>
        <div class="input-group input-group-static mb-4">
            <label>Password</label>
            <input type="passwrod" name="password" class="form-control" value="{{old('password') ?? $user->password}}">
            @error('password')
                <span class="text-danger">{{ $message}}</span>
            @enderror
        </div>
        <div class="input-group input-group-static mb-4">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{old('phone') ?? $user->phone}}">
            @error('phone')
                <span class="text-danger">{{ $message}}</span>
            @enderror
        </div>
       
        <div class="input-group input-group-static mb-4">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="{{old('address') ?? $user->address}}">
            @error('address')
                <span class="text-danger">{{ $message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Roles</label>
            @foreach($roles as $groupName => $role)
                <div class="col-5">
                   <div class="row">
                    <h4>{{$groupName}}</h4>
                        <div>
                            @foreach($role as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="role_ids[]" 
                                {{$user->roles->contains('id',$item->id) ? 'checked':''}}
                                value="{{$item->id}}">
                                <label class="custom-control-label" for="customCheck1">{{$item->display_name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="input-group input-group-static mb-4">
            <label  name="gender" class="ms-0">gender</label>
            <select  name="gender" class="form-control " >
                <option value="male">Male</option>
                <option value="fe-male">Female</option>
              
            </select>  
            @error('gender')
                <span class="text-danger">{{ $message}}</span>
            @enderror
        </div>
        

        

        <button type="submit" class="btn btn-submit btn-primary">Submit</button>
        </form>
      

    </div>
@endsection
@section('script')

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $(() => {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show-image').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#image-input").change(function() {
                readURL(this);
            });



        });
    </script>
@endsection
