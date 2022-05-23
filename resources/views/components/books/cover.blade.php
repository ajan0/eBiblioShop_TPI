<article {{ $attributes }}>
    {{-- Cover --}}
    <div>
        <img class="book-cover-sm" src="{{ asset($book->cover_path) }}" alt="{{ 'title' }}">
    </div>
</article>