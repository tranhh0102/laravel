@extends('admin.layouts.app')
@section('title','Edit Roles'.$role->name)
@section('content')
    <h1>Edit Roles</h1>
    <div>
        <form action="{{route('roles.update',$role->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="input-group input-group-static mb-4">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{old('name') ?? $role->name}}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-group input-group-static mb-4">
            <label>DisplayName</label>
            <input type="text" name="dispaly_name" class="form-control" value="{{old('name') ?? $role->name}}">
            @error('display_name')
                <span class="text-danger">{{ $message}}</span>
            @enderror
        </div>

        <div class="input-group input-group-static mb-4">
            <label  name="group" class="ms-0">Group</label>
            <select  name="group" class="form-control " value="{{ $role->group}}" >
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
                            <input class="form-check-input" type="checkbox" name="permission_ids[]" 
                            {{$role->permissions->contains('name',$item->name) ? 'checked':''}}
                            value="{{$item->id}}">
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