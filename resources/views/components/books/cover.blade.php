<a href="{{ route('books.show', $book) }}">
    <article class="{{ $attributes->get('class') }}">
        {{-- Cover --}}
        <img class="book-cover book-cover-sm" src="{{ asset($book->cover_path) }}" alt="{{ 'title' }}">
    </article>    
</a>