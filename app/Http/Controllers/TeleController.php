<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Telefono;
use App\Marca;

class TeleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    public function index(Request $request)
    { 
         $record = Telefono::where(function($query) use($request)
            { 
                if($request->has('id_marca')) 
                {
                    $query->where('id_marca' , $request->id_marca);
                }  
                if($request->has('id_modello')) 
                {
                    $query->where('id_modello' , $request->id_modello);
                }  
            })->paginate(10); 

        if($record->count() == 0)
        {
            return responsejson( 0 , 'error' , 'There Is No Telefono Recorded');
        } 
        return responsejson(1 , 'success' , $record);
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all(); 
        $validator = validator()->make($data, [
 
            'id_marca'   => 'required|numeric',
            'id_modello' => 'required|numeric', 
            'q1'         => 'required|numeric', 
            'q2'         => 'required|numeric', 
            'q3'         => 'required|numeric', 
            'prezzo'     => 'required|numeric', 
        ]);

        if ($validator->fails()) 
        {
            return responsejson( 0 , $validator->errors()->first() , $validator->errors()); 
        } 
        $record = Telefono::create($data);   
        return responsejson(1 , 'success' , $record ); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Telefono::findOrFail($id); 
        if(! $record)
        {
            return responsejson( 0 , 'error' , 'There Is No Telefono Recorded');
        } 
        return responsejson(1 , 'success' , $record); 
    } 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all(); 
        $validator = validator()->make($data, [   
 
            'id_marca'   => 'required|numeric',
            'id_modello' => 'required|numeric', 
            'q1'         => 'required|numeric', 
            'q2'         => 'required|numeric', 
            'q3'         => 'required|numeric', 
            'prezzo'     => 'required|numeric',  
        ]); 
        if ($validator->fails()) 
        {
            return responsejson(0 , $validator->errors()->first() , $validator->errors()); 
        }   

        $record = Telefono();  
        $record->update($data); 
        return responsejson(1 , 'success' , $record ); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record   =  $id ;       
        return responsejson(1 , 'success' , $record );  
    }    
 




    public function marcastore(Request $request)
    { 
        $data = $request->all(); 
        $validator = validator()->make($data, [ 
            'title'             => 'required|min:6',  
        ]);
 
        if ($validator->fails()) 
        {
            return responsejson(0 , $validator->errors()->first() , $validator->errors()); 
        } 
        $record = Marca::create($data);   
        return responsejson(1 , 'success' , $record );  
  
    }
}
