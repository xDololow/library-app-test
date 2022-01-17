<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Readers;
use App\Models\Tags;
use App\Models\Shelf;


class Books extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['author', 'tags', 'reader_id', 'category_id', 'shelf_id', 
        'photo', 'taken_date'];

    public function category()
    {
        return $this->hasOne('App\Models\Category');
    }
    
    public function reader()
    {
        return $this->hasOne('App\Models\Readers');
    }

    public function show($id)
    {
        // return view('user.profile', [
        //     'reader' => Reader::findOrFail($id)
        // ]);
    }

    public function getReaderName($id){
        return Readers::find($id)->first()->full_name;
    }

    public function getShelfName($id){
        return Shelf::find($id)->first()->name;
    }
}
