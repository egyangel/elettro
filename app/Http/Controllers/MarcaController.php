<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Marca;

class MarcaController extends Controller
{
 
  

    public function index(Request $request)
    { 
        $records = Marca::all();
        return view('marca.index', ['records' => $records]);
    } 
  

    public function create(Request $request)
    {  
        return view('marca.create');
    }  
    

    public function store(Request $request)
    {
        $record = new Marca(); 
        $record->title  =$request->title; 
        $record->save(); 
        return Resp::success($record);
    }

 
    public function edit(Marca $marca)
    {
        return view('marca.edit' , compact('marca')); 
    } 
 
 
    public function update(Request $request, Marca $marca)
    { 

        $marca->update($request->all());    
        return Resp::success($marca);
    }

 
    public function destroy(Marca $marca)
    {
        $marca->delete();
        return Resp::success($marca);
    }   
}
