<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Readers;

class ReadersController extends Controller
{
    public function show(){
        $readers = Readers::all();    

        return view('edit-readers-modal', [
            'readers' => $readers,
        ]);
    }
    
    public function loadReaderForEdit(Request $request){
        $input = $request->all();

        $reader = Readers::find($input['id']);   

        return $reader;
    }

    public function addReader(Request $request){
        $input = $request->all();

        Readers::create([
            'created_at' => date("Y-m-d"),
            'full_name' => $input['full_name'],
            'birth_date' => $input['birth_date'],
        ]);

        return response("Читатель добавлен!", 200);
    }

    public function editReader(Request $request){
        $input = $request->all();

        $reader = Readers::find($input['id']);

        $reader->full_name = $input['full_name'];
        $reader->birth_date = $input['birth_date'];
        $reader->save();

        return response("Читатель обновлён!", 200);
    }
    
    public function deleteReader(Request $request){
        $input = $request->all();

        $reader = Readers::find($input['id']);

        if (!isset($reader))
            return response("Такого Читателя нет.", 500);
        
        $reader->delete();

        return response("Читатель был удален", 200);
    }

    
}
