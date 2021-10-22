<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;
    public $newimage;
    public $slider_id;

    public function mount($slide_id)
    {
        # code...
        $slider = HomeSlider::find($slide_id);

        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->price = $slider->price;
        $this->link = $slider->link;
        $this->image = $slider->image;
        $this->status = $slider->status;
        $this->slider_id = $slider->id;
    }

    public function updateSlider()
    {
        # code...
        $slider = HomeSlider::find($this->slider_id);

        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        if($this->newimage){
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAS('sliders',$imageName);
            $slider->image = $imageName;
        }
        $slider->status = $this->status;

        $slider->save();

        session()->flash('message','New Home Slider Has Been Updated Successfuly¡');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')
        ->layout('layouts.base');
    }
}
