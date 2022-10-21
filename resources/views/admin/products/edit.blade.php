@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Product
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
                    <form action="{{ url('admin/products/' .$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" value="{{$product->name}}" name="name" class="form-control">
                                @error('name')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Slug</label>
                                <input type="text" value="{{$product->slug}}" name="slug" class="form-control">
                                @error('slug')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Select Category</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value=""></option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected':''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Select Brand</label>
                                <select name="brand" id="" class="form-control">
                                    <option value=""></option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->name}}" {{$brand->name == $product->brand ? 'selected':''}}>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Small Description</label>
                                <textarea name="Small_description" id="" rows="3" class="form-control">{{$product->Small_description}}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea name="description" id="" rows="3" class="form-control">{{$product->description}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Upload product Images</label>
                                <input type="file" name="image[]" class="form-control" multiple >
                            </div>
                            <div>
                                @if($product->productImages)
                                    <div class="row">
                                        @foreach($product->productImages as $images)
                                        <div class="col-md-2">
                                            <img src="{{asset('uploads/products/'.$images->image)}}" style="width: 80px;height:80px" class="me-4 border" alt="img">
                                            <a href="{{url('admin/product-image/'.$images->id.'/delete')}}" class="d-block">Remove</a>
                                        </div>
                                        @endforeach
                                    </div>
                                @else
                                <h5>No Images found</h5>
                                @endif
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Status</label><br>
                                <input type="checkbox" {{$product->status == 1 ? 'checked' : ''}} name="status" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Trending</label><br>
                                <input type="checkbox" {{$product->trending == 1 ? 'checked' : ''}} name="trending" >
                            </div>
                            <div class="col-md-12">
                                <h4>SEO Tags</h4>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta Titile</label>
                                <input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta Keyword</label>
                                <textarea name="meta_keyword" id="" rows="3" class="form-control">{{$product->meta_keyword}}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" id="" rows="3" class="form-control">{{$product->meta_description}}</textarea>
                            </div>
                            <div class="col-md-12">
                                <h4>Details</h4>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Original Price</label>
                                <input type="text" value="{{$product->original_price}}" name="original_price" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Selling Price</label>
                                <input type="text" value="{{$product->selling_price}}" name="selling_price" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Quantity</label>
                                <input type="text" value="{{$product->quantity}}" name="quantity" class="form-control">
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