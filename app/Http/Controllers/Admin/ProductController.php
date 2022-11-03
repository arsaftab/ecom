<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status','0')->get();
        return view('admin.products.create', compact('categories', 'brands', 'colors'));
    }
    public function store(ProductRequest $request)
    {
        // $validatedData = $request->validate();
        // dd($request);
        $category = Category::findOrFail($request->category_id);

        $product = $category->products()->create([
            'name' => $request->name,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'brand' => $request->brand,
            'Small_description' => $request->Small_description,
            'description' => $request->description,
            'status' => $request->status == true ? '1':'0',
            'trending' => $request->trending == true ? '1':'0',
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
        ]);

        if($request->hasFile('image')){
            $upload_path = 'uploads/products/';
            foreach($request->File('image') as $file){
                $ext = $file->getClientOriginalExtension();
                // $filename = time().$i++.'.'.$ext;
                $filename = $file->getClientOriginalName();
                $file->move($upload_path, $filename);

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $filename,
                ]);
            }
        }
        if ($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->color_quantity[$key] ?? 0,
                ]);
            }
        }

        return redirect('/admin/products')->with('message', 'Product Added Successfully');
    }
    public function edit($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($id);
        $product_color = $product->productColors->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id',$product_color)->get();
        return view('admin.products.edit', compact('categories', 'brands','product', 'colors'));
    }
    public function update(ProductRequest $request, $id)
    {
        
        $product = Category::findOrFail($request->category_id)
                            ->products()->where('id', $id)->first();
        
        if ($product) {
            $product->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'category_id' => $request->category_id,
                'brand' => $request->brand,
                'Small_description' => $request->Small_description,
                'description' => $request->description,
                'status' => $request->status == true ? '1':'0',
                'trending' => $request->trending == true ? '1':'0',
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'original_price' => $request->original_price,
                'selling_price' => $request->selling_price,
                'quantity' => $request->quantity,
            ]);

            if($request->hasFile('image')){
                $upload_path = 'uploads/products/';
                foreach($request->File('image') as $file){
                    // $ext = $file->getClientOriginalExtension();
                    // $filename = time().$i++.'.'.$ext;
                    $filename = $file->getClientOriginalName();
                    $file->move($upload_path, $filename);
    
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $filename,
                    ]);
                }
            }
            if ($request->colors) {
                foreach ($request->colors as $key => $color) {
                    $product->productColors()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->color_quantity[$key] ?? 0,
                    ]);
                }
            }
            return redirect('admin/products')->with('message', 'Product Updated Successfully');
            
            
        } else {
            return redirect('admin/products')->with('message', 'Product Not found ');
        }
        
    }
    public function destroyImage($pr_imgId)
    {
        $product_Img = ProductImage::findOrFail($pr_imgId);
        $path = 'uploads/products/' .$product_Img->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $product_Img->delete();
        return redirect('admin/products')->with('message', 'Product Image Deleted Successfully');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->productImages) {
            foreach ($product->productImages as $product_Img) {
                $path = 'uploads/products/' .$product_Img->image;
                if(File::exists($path)){
                    File::delete($path);
                }
            }
        }
        $product->delete();
        return redirect('admin/products')->with('message', 'Product Deleted Successfully');
    }

    public function updateProdClrQty(Request $request)
    {
        $productColorData = Product::findOrFail($request->product_id)
                            ->productColors()->where('id', $request->prod_color_id)->first();
        $productColorData->update([
            'quantity' => $request->qty,
        ]);
        return response()->json(['message'=>'Product Color Updated']);
        
    }
    public function deleteProdClrQty(Request $request)
    {
        $productColorData = ProductColor::findOrFail($request->prod_color_id);
        $productColorData->delete();
        return response()->json(['message'=>'Product Color deleted']);
    }
}
