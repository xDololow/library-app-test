<ul class="list-group list-group-flush">
    @foreach ($books as $book)
        <li class="list-group-item">Книга автора <span class="font-weight-bold">{{$book->author}}</span> 
            взята читателем <span class="font-weight-bold">{{$book->full_name}}</span> в {{$book->taken_date}}.</li>
    @endforeach
</ul>