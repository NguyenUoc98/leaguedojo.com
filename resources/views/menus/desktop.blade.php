@php
    $routeCurrent = Route::current()->getName();
@endphp

<div class="flex space-x-2">
    @foreach($items as $menu_item)
        <a href="{{ $menu_item->link() }}"
           class="@if($routeCurrent == $menu_item->route) bg-cancel @endif hover:bg-cancel text-white px-3 py-2 rounded-md text-sm font-medium">
            {{ $menu_item->title }}
        </a>
    @endforeach
</div>
