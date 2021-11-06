<ul>
    @foreach($items as $menu_item)
    <li><a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a>
        @if($menu_item->route == 'news')
        <ul class="dropdown">
            @foreach($categories as $category)
            <li><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
        @endif
    </li>
    @endforeach
</ul>