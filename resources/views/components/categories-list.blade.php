<ul class="list-unstyled">
    @foreach ($categories as $category)
        <li class="my-2"><a class="text-body" href="{{ route('search') }}?category={{ urlencode($category->title) }}">{{ $category->title }}</a></li>        
    @endforeach
</ul>