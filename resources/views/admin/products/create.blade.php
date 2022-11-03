@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Product
                        <a href="{{ url('admin/products') }}" class="btn btn-primary btn-sm float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert text-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                    @endif
                    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                                @error('name')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Slug</label>
                                <input type="text" name="slug" class="form-control">
                                @error('slug')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Select Category</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="" ></option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" >{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Select Brand</label>
                                <select name="brand" id="" class="form-control">
                                    <option value=""></option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->name}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Small Description</label>
                                <textarea name="Small_description" id="" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea name="description" id="" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Image</label>
                                <input type="file" name="image[]" class="form-control" multiple >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Status</label><br>
                                <input type="checkbox" name="status" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Trending</label><br>
                                <input type="checkbox" name="trending" >
                            </div>
                            <div class="col-md-12">
                                <h4>SEO Tags</h4>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta Titile</label>
                                <input type="text" name="meta_title" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta Keyword</label>
                                <textarea name="meta_keyword" id="" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" id="" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <h4>Details</h4>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Original Price</label>
                                <input type="text" name="original_price" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Selling Price</label>
                                <input type="text" name="selling_price" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Quantity</label>
                                <input type="text" name="quantity" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <h4>Select Colors</h4>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="row">
                                    @foreach($colors as $color)
                                        <div class="col-md-2 p-d border">
                                            Color: <input type="checkbox" name="colors[{{$color->id}}]" value="{{$color->id}}" />
                                            {{$color->name}} <br>
                                            Quantity: <input type="number" name="color_quantity[{{$color->id}}]" style="width:100px; border:1px solid" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary float-end">Save</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection