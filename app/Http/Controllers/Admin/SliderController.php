<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy("order","ASC")->get();
        return view('admin.slider.index',["sliders"=>$sliders]);
    }

    public function create(){
        return view('admin.slider.create');
    }
}
