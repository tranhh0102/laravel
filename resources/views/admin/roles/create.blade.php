@extends('admin.layouts.app')
@section('title','Create Roles')
@section('content')
    <h1>Create Roles</h1>
    <div>
        <form action="{{route('roles.store')}}" method="post">
        @csrf
        <div class="input-group input-group-static mb-4">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
            @error('name')
                <span class="text-danger">{{ $message}}</span>
            @enderror
        </div>
        <div class="input-group input-group-static mb-4">
            <label>DisplayName</label>
            <input type="text" name="display_name" class="form-control">
            @error('display_name')
                <span class="text-danger">{{ $message}}</span>
            @enderror
        </div>

        <div class="input-group input-group-static mb-4">
            <label  name="group" class="ms-0">Group</label>
            <select  name="group" class="form-control " >
                <option>system</option>
                <option>user</option>
              
            </select>  
            @error('group')
                <span class="text-danger">{{ $message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Permission</label>
            @foreach($permissions as $groupName => $permission)
                <div class="col-3">
                    <h4>{{$groupName}}</h4>
                    <div>
                        @foreach($permission as $item)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission_ids[]" value="{{$item->id}}">
                            <label class="custom-control-label" for="customCheck1">{{$item->display_name}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-submit btn-primary">Submit</button>
        </form>
      

    </div>
@endsection