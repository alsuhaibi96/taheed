<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function loadComponent(Request $request)
    {
        $component = $request->input('component');
        return view('components.' . $component)->render();
    }
}
