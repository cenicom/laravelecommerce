<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;

    public function mount()
    {
        # code...
        $this->stock_status = 'Instock';
        $this->featured = 0;
    }

    public function generateSlug()
    {
        # code...
        $this->slug = Str::slug($this->name, '-');
    }

    public function addProduct()
    {
        # code...
        $rules = [
            'name'=>'required',
            'slug'=>'required|unique:products',
            'short_description'=>'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png',
        ];

        $messages = [
            'name.required' => 'Este Campo es Obligatorio',

            'slug.required' => 'Este Campo es Obligatorio',
            'slug.unique' => 'Este Valor debe ser único',

            'short_description.required' => 'Este Campo es Obligatorio',
            'description.required' => 'Este Campo es Obligatorio',

            'regular_price.required' => 'Este Campo es Obligatorio',
            'regular_price.numeric' => 'Solo se Aceptan Valores Numéricos',
            'sale_price.required' => 'Este Campo es Obligatorio',
            'sale_price.numeric' => 'Solo se Aceptan Valores Numéricos',

            'SKU.required' => 'Este Campo es Obligatorio',
            'stock_status.required' => 'Este Campo es Obligatorio',

            'quantity.required' => 'Este Campo es Obligatorio',
            'quantity.numeric' => 'Solo se Aceptan Valores Numéricos',

            'image.required' => 'Este Campo es Obligatorio',
            'image.mimes' => 'Formato de Imagenes NO Válido',
        ];

        $this->validate($rules, $messages);

        $product = new Product();

        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAS('products',$imageName);
        $product->image = $imageName;
        $product->category_id = $this->category_id;

        $product->save();

        session()->flash('message','New Product Has Been Added Successfuly¡');
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.admin-add-product-component',[
            'categories' => $categories
        ])
        ->layout('layouts.base');
    }

    public function updated($fields)
    {
        # code...
        $rules = [
            'name'=>'required',
            'slug'=>'required|unique:products',
            'short_description'=>'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png',
        ];

        $messages = [
            'name.required' => 'Este Campo es Obligatorio',

            'slug.required' => 'Este Campo es Obligatorio',
            'slug.unique' => 'Este Valor debe ser único',

            'short_description.required' => 'Este Campo es Obligatorio',
            'description.required' => 'Este Campo es Obligatorio',

            'regular_price.required' => 'Este Campo es Obligatorio',
            'regular_price.numeric' => 'Solo se Aceptan Valores Numéricos',
            'sale_price.required' => 'Este Campo es Obligatorio',
            'sale_price.numeric' => 'Solo se Aceptan Valores Numéricos',

            'SKU.required' => 'Este Campo es Obligatorio',
            'stock_status.required' => 'Este Campo es Obligatorio',

            'quantity.required' => 'Este Campo es Obligatorio',
            'quantity.numeric' => 'Solo se Aceptan Valores Numéricos',

            'image.required' => 'Este Campo es Obligatorio',
            'image.mimes' => 'Formato de Imagenes NO Válido',
        ];

        $this->validate($rules, $messages);
    }
}
