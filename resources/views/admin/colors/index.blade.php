@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Colors
                        <a href="{{ route('colors.create') }}" class="btn btn-primary btn-sm text-white float-end">Add Colors</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-dark">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $color)
                            <tr>
                                <td>{{$color->id}}</td>
                                <td>{{$color->name}}</td>
                                <td>{{$color->code}}</td>
                                <td>{{$color->status == 0? 'visible':'hidden'}}</td>
                                <td>
                                    <form action="{{route('colors.destroy', $color->id)}}" method="post">
                                        <a href="{{route('colors.edit', $color->id)}}" class="btn btn-success btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, you want to delete this data?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection