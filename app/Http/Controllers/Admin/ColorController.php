<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }
    public function create()
    {
        return view('admin.colors.create');
    }
    public function store(ColorRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1' : '0';


        Color::create($validatedData);

        // $color = new Color();
        // $color->name = $validatedData['name'];
        // $color->code = $validatedData['code'];
        // $color->status = $request->status == true ? '1' : '0';
        // $color->save();

        return redirect('/admin/colors')->with('message', 'Color Added Successfully');

    }
    public function edit($id)
    {
        $color = Color::findOrFail($id);
        return view('admin.colors.edit', compact('color'));
    }
    public function update(ColorRequest $request, $id)
    {
        // $color = Color::findOrFail($id);
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1' : '0';


        Color::find($id)->update($validatedData);
        
        // $color->name = $validatedData['name'];
        // $color->code = $validatedData['code'];
        // $color->status = $request->status == true ? '1' : '0';
        // $color->update();

        return redirect('/admin/colors')->with('message', 'Color Updated Successfully');
    }
    
    public function destroy($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();
        return redirect('/admin/colors')->with('message', 'Color Deleted Successfully');

    }
}
