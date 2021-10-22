<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
    public $category_slug;
    public $category_id;
    public $name;
    public $slug;

    public function mount($category_slug)
    {
        # code...
        $this->category_slug = $category_slug;

        $category = Category::where('slug',$category_slug)->first();

        $this->category_id = $category->id;

        $this->name = $category->name;

        $this->slug = $category->slug;
    }

    public function generateslug()
    {
        # code...
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        # code...
        $this->validateOnly([
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
    }

    public function updateCategory()
    {
        # code...
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);

        $category = Category::find($this->category_id);

        $category->name = $this->name;

        $category->slug = $this->slug;

        $category->save();

        session()->flash('message','Category Has Been Upadated Successfuly¡');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')
        ->layout('layouts.base');
    }
}
