@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Products
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm text-white float-end">Add Product</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-dark">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Categoty</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Trending</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->slug}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->original_price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->status}}</td>
                                <td>{{$product->trending}}</td>
                                <td>
                                    <form action="{{url('admin/products/'.$product->id)}}" method="post">
                                        <a href="{{url('admin/products/'.$product->id.'/edit')}}" class="btn btn-success btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, you want to delete this data?')">Delete</button>
                                    </form>
                                    {{-- <a href="{{ route('products.destroy', $product->id ) }}" onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-danger btn-sm">Delete</a> --}}
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