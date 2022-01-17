<?php

namespace Tests\Feature;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Books;

class BookTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_adding_book(){

        $file = new UploadedFile(
            Storage::path('public/test.jpg'), 
            "test.jpg", 
            'image/jpeg', 
            null, 
            true
        );

        $response = $this->post('/addBook', [
            'author' => 'Автор',
            'tags' => 'Тег_1 Тег_2',
            'reader' => 0,
            'category' => 1,
            'shelf' => 1,
            'photo' => $file,
            'taken_date' => '2021-11-11',
        ]);
        
        $response->assertStatus(200);
    }
    
    public function test_adding_book_without_photo(){
        
        $response = $this->post('/addBook', [
            'author' => 'Автор',
            'tags' => 'Тег_1 Тег_2',
            'reader' => 0,
            'category' => 1,
            'shelf' => 1,
            'photo' => NULL,
            'taken_date' => '2021-11-11',
        ]);
        
        $response->assertStatus(500);
    }

    public function test_editing_book(){
        $book_id = Books::select('id')->latest('id')->first()['id'];
        
        $file = new UploadedFile(
            Storage::path('public/ad.png'), 
            'ad.png', 
            'image/jpeg', 
            null, 
            true
        );

        $response = $this->post('/updateBook', [
            'id' => $book_id,
            'author' => 'Авторка',
            'tags' => 'Тег_1 Тег_4',
            'reader' => 1,
            'category' => 1,
            'shelf' => 1,
            'photo' => $file,
            'taken_date' => '2021-11-11',
        ]);

        $response->assertStatus(200);
    }

    public function test_deleting_book(){
        $book_id = Books::select('id')->latest('id')->first()['id'];
        
        $response = $this->post('/deleteBook', [
            'id' => $book_id,
        ]);

        $response->assertStatus(200);
    }
}
