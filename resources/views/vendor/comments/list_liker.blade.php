@foreach($users as $user)
    <div class="flex items-center">
        <a class="avatar mr-2">
            <img class="rounded-full" src="{{ Voyager::image($user->avatar) }}" alt="{{ $user->name }}" width="35px">
        </a>
        <b><span class="name mb-0 text-sm">{{ $user->name }}</span></b>
    </div>
@endforeach
