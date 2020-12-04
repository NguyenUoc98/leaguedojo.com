<tr>
    <td style="width:150px;">
        <a href="{{ $url }}">
            <img alt="Logo" height="auto" src="{{ config('app.url') . '/img/core-img/logo2.jpg' }}" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:14px;" width="40" />
            {{ $slot }}
        </a>
    </td>
</tr>
