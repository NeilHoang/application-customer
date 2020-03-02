<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }
    
    public function create()
    {
        $cities = City::all();
        return view('cities.create', compact('cities'));
    }
    
    public function store(Request $request)
    {
        $cities = new City();
        $cities->name = $request->name;
        $cities->save();
        return redirect()->route('cities.index');
    }
    
    public function delete($id)
    {
        $cities = City::findOrFail($id);
        $cities->delete();
        return redirect()->route('cities.index');
    }
    
    public function edit($id)
    {
        $cities = City::findOrFail($id);
        return view('cities.edit', compact('cities'));
    }
    
    public function update(Request $request,$id)
    {
        $cities = City::findOrFail($id);
        $cities->name = $request->name;
        $cities->save();
        return redirect()->route('cities.index');
        
    }
}
