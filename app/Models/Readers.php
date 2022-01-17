<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Books;

class Readers extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = ['created_at', 'full_name', 'birth_date'];

    public function books()
    {
        return $this->hasMany('App\Models\Books');
    }

    public function show($id)
    {
        return view('user.profile', [
            'reader' => Reader::findOrFail($id)
        ]);
    }

    
}
