<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;

    public function generateslug()
    {
        # code...
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        # code...
        $rules = [
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ];

        $messages = [
            'name.required' => 'Nombre de la Categoria es Obligatorio',

            'slug.required' => 'La Descripción de la Categoria es Obligatoria',
            'slug.unique' => 'La Descripción de la Categoria Debe de Tener Mínimo 3 Caracteres',

        ];

        $this->validate($rules, $messages);
    }

    public function storeCategory()
    {
        # code...
        $rules = [
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ];

        $messages = [
            'name.required' => 'Nombre de la Categoria es Obligatorio',

            'slug.required' => 'La Descripción de la Categoria es Obligatoria',
            'slug.unique' => 'La Descripción de la Categoria Debe de Tener Mínimo 3 Caracteres',

        ];

        $this->validate($rules, $messages);

        $category = new Category();

        $category->name = $this->name;

        $category->slug = $this->slug;

        $category->save();

        session()->flash('message','Categoria Agregada Correctamente');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')
        ->layout('layouts.base');
    }
}
