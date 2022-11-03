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
                            <div class="col-md-12">
                                <h4>Select Colors</h4>
                            </div>
                            <div class="prod-clr-div col-md-12 mb-3">
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
                            @if (isset($product->productColors))
                            <div class="table-resposive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th >Color Name</th>
                                            <th>Quantity</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->productColors as $productColor)
                                        <tr class="prod-clr-tr">
                                            <td class="col-md-5">
                                                @if ($productColor->colors)
                                                {{$productColor->colors->name}}</td>
                                                @else
                                                <h3>No colors available</h3>
                                                @endif
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" value="{{$productColor->quantity}}" id="qty" class="prodColorQty form-control form-control-sm" />
                                                    <button type="button" value="{{$productColor->id}}" class="updateProdColorBtn btn btn-danger btn-sm text-white" >update</button>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" value="{{$productColor->id}}" class="deleteProdColorBtn btn btn-danger btn-sm text-white float-end">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
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

@section('scripts')
<script>
    $( document ).ready(function() {

        $( document ).on('click', '.updateProdColorBtn', function () {
            var product_id = "{{ $product->id }}";
            var prod_color_id = $(this).val();
            //var qty = $('.prodColorQty').val();
            var qty = $(this).prev().val();

                if(qty <= 0){
                    alert('Quantity is required');
                    return false;
                }

            var data = {
                'product_id': product_id,
                'prod_color_id': prod_color_id,
                'qty': qty,
                "_token": "{{ csrf_token() }}",
            };

            $.ajax({
                type: "POST",
                url: "{{ route('prod_clr_upd') }}",
                data: data,
                success: function (response) {
                    // alert(response.message)
                    console.log(response.message)
                }
            });
        });

        $( document ).on('click', '.deleteProdColorBtn', function () {
            var product_id = "{{ $product->id }}";
            var prod_color_id = $(this).val();
            var thisClick = $(this);

            thisClick.closest('.prod-clr-tr').remove();

            var data = {
                'product_id': product_id,
                'prod_color_id': prod_color_id,
                "_token": "{{ csrf_token() }}",
            };

            $.ajax({
                type: "POST",
                url: "{{ route('prod_clr_dlt') }}",
                data: data,
                success: function (response) {
                    alert(response.message)
                    // location.reload();
                    // $('#prod-clr-div').load(location.href + "prod-clr-div");
                    // console.log(response.message)
                }
            });
        });
    });
</script>
@endsection