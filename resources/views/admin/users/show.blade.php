@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>User Details
                        {{-- <a href="{{ url('admin/colors') }}" class="btn btn-primary btn-sm float-end">Back</a> --}}
                    </h3>
                </div>
                <div class="card-body">
                    {{-- @if($errors->any())
                    <div class="alert text-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                    @endif --}}
                    
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control">
                                @error('name')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Email</label>
                                <input type="text" name="code" value="{{$user->email}}" class="form-control">
                                @error('code')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Active</label><br>
                                {{-- <input id="isActive" user_id="{{ $user->id }}" type="checkbox" {{$user->is_active == 1 ? 'checked' : ''}} name="status" > --}}
                                <input id="isActive" user_id="{{$user->id}}" type="checkbox" {{$user->is_active == 1 ? 'checked' : ''}} data-bs-toggle="toggle">
                            </div>
                            
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection