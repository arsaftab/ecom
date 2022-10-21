@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Color
                        <a href="{{ url('admin/colors') }}" class="btn btn-primary btn-sm float-end">Back</a>
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
                    <form action="{{route('colors.update', $color->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$color->name}}" class="form-control">
                                @error('name')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Code</label>
                                <input type="text" name="code" value="{{$color->code}}" class="form-control">
                                @error('code')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Status</label><br>
                                <input type="checkbox" {{$color->status == 1 ? 'checked' : ''}} name="status" >
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary float-end">Update</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection