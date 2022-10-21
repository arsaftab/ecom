<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    //define veriable of input fields in modal
    public $name, $slug, $status, $brandId;
    public function render()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(3);
        return view('livewire.admin.brand.index', ['brands' => $brands])
        ->extends('layouts.admin')
        ->section('content');
    }
    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brandId = NULL;
    }
    //validation
    
    public function rules()
    {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable',
        ];
    }

    public function storeBrand()
    {
        $validatedData = $this->validate();
        // dd($validatedData);
        Brand::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status == true ? '1':'0',
        ]);
        session()->flash('message', 'Brand Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    //update
    public function editBrand(int $brand_id)
    {
        $this->brandId = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
    }
    public function updateBrand()
    {
        $validatedData = $this->validate();
        // dd($validatedData);
        Brand::findOrFail($this->brandId)->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status == true ? '1':'0',
        ]);
        session()->flash('message', 'Brand Updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    //delete
    public function deleteBrand(int $brand_id)
    {
        $this->brandId = $brand_id;
    }
    public function destroyBrand()
    {
        Brand::findOrFail($this->brandId)->delete();
        session()->flash('message', 'Brand Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
}
