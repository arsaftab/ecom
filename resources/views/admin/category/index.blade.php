@extends('layouts.admin')

@section('content')
<div>
    <livewire:admin.category.index />
</div>

    {{-- <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Category
                        <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm text-white float-end">Add Category</a>
                    </h3>
                </div>
                <div class="card-body">
                    //cate
                </div>
            </div>
        </div>
    </div> --}}
    
@endsection