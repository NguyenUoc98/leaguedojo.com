@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Rất tiếc!')
@else
# @lang('Xin chào bạn!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'primary':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'success';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Thân ái và quyết thắng!')<br>
Karate League Dojo - K.L.D
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "Nếu bạn gặp sự cố khi nhấp vào nút \":actionText\", sao chép và dán URL bên dưới \n".
    'vào trình duyệt web của bạn: [:actionURL](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
    ]
)
@endslot
@endisset
@endcomponent
