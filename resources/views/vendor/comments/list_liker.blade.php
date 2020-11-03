@foreach($users as $user)
<div class="media align-items-center mb-2">
    <a class="avatar mr-2">
        <img class="rounded-circle" src="{{ Voyager::image($user->avatar) }}" alt="{{ $user->name }}" width="35px">
    </a>
    <div class="media-body">
        <b><span class="name mb-0 text-sm">{{ $user->name }}</span></b>
    </div>
</div>
@endforeach
