<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Category;
use App\Models\Shelf;
use App\Models\Tags;
use App\Models\Readers;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{

    public function show(){
        $bookCategories = Category::all();
        $allBooks = Books::all();

        return view('index', [
            'bookCategories' => $bookCategories,
            'allBooks' => $allBooks,
        ]);
    }

    public function dataForBookEdit(Request $request){
        $input = $request->all();

        if ($input['id'] != 0){
           $book = Books::select('id', 'author', 'tags', 'reader_id', 'category_id', 'shelf_id', 'taken_date')
            ->where('id', $input['id'])
            ->first();  
        }

        $categories = Category::all();
        $shelves = Shelf::all();
        $tags = Tags::all();
        $readers = Readers::all();
        
        if ($input['id'] != 0){
            return view('edit-modal', [
                'book' => $book,
                'categories' => $categories,
                'shelves' => $shelves,
                'tags' => $tags,
                'readers' => $readers,
            ]);
        } else {
            return view('add-modal', [
                'categories' => $categories,
                'shelves' => $shelves,
                'tags' => $tags,
                'readers' => $readers,
            ]);
        }
        
    }

    public function updateBook(Request $request){
        $input = $request->all();
        
        $book = Books::find($input['id']);

        $book->author = $input['author'];
        $book->tags = $input['tags'];
        $book->reader_id = ($input['reader'] == 0) ? NULL : $input['reader'];
        $book->category_id = $input['category'];
        $book->shelf_id = $input['shelf'];
        if ($input['photo'] == "null") {
            $book->photo = $input['photo']->get();
        }
        if ($book->reader_id != $input['reader']) {
            $taken_date = date("Y-m-d");
            $book->taken_date = $taken_date;
        }

        $book->save();
        return response("Книга обновлена!", 200);
    }

    public function addNewBook(Request $request){
        $input = $request->all();
        
        if ($input['photo'] == "null") return response("Нет обложки книги", 500);

        if ($input['reader'] != 0){
            $taken_date = date("Y-m-d");
        }


        Books::create([
            'author' => $input['author'],
            'tags' => $input['tags'],
            'reader_id' => ($input['reader'] == 0) ? NULL : $input['reader'],
            'category_id' => $input['category'],
            'shelf_id' => $input['shelf'],
            'photo' => base64_encode($input['photo']->get()),
            'taken_date' => (isset($taken_date)) ? $taken_date : NULL,
        ]);

        return response("Книга добавлена!", 200);
    }


    public function deleteBook(Request $request){
        $input = $request->all();
        
        $book = Books::find($input['id']);     
        
        if (!isset($book))
            return response("Такой книги нет.", 500);
        
        $book->delete();

        return response("Книга была удалена", 200);
    }
    
    public function readingJournal(){
        $books = Books::select('author', 'readers.full_name', 'taken_date', )
        ->whereNotNull('reader_id')
        ->join('readers', 'books.reader_id', '=', 'readers.id')
        ->get();
        
        return view('journal', [
            'books' => $books,
        ]);
    }
}

