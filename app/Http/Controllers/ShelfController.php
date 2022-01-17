<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shelf;

class ShelfController extends Controller
{
    public function show(){
        $shelves = Shelf::all();

        return view('edit-shelf-modal', [
            'shelves' => $shelves,
        ]);
    }

    public function addShelf(Request $request){
        $input = $request->all();

        
        Shelf::create([
            'name' => $input['name'],
        ]);

        return response("Полка добавлена!", 200);
    }
    
    public function editShelf(Request $request){
        $input = $request->all();

        $shelf = Shelf::find($input['id']);

        $shelf->name = $input['name'];
        $shelf->save();
        
        return response("Полка обновлена!", 200);
    }
    
    public function deleteShelf(Request $request){
        $input = $request->all();

        $shelf = Shelf::find($input['id']);

        if (!isset($shelf))
            return response("Такой полки нет.", 500);
        
        $shelf->delete();

        return response("Полка была удалена", 200);
    }

}
