<div class="small-box" style="background-color: {{ $image }}">
    <div class="inner">
        <h3>{!! $title !!}</h3>

        <p><b>{!! $text !!}</b></p>
    </div>
    <div class="icon">
        @if (isset($icon))<i class='ion {{ $icon }}'></i>@endif
    </div>
    <a href="{{ $button['link'] }}" class="small-box-footer"><b>Xem thêm </b><i class="voyager-double-right"></i></a>
</div>

<style>
    .small-box {
        border-radius: .25rem;
        box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
        display: block;
        margin-bottom: 20px;
        position: relative;
        color: #fff;
        text-align: left;
    }

    .small-box>.inner {
        padding: 10px;
    }

    .small-box h3 {
        font-size: 2.2rem;
        font-weight: 700;
        margin: 0 0 10px 0;
        padding: 0;
        white-space: nowrap;
        z-index: 5;
    }

    .small-box p {
        font-size: 1rem;
        z-index: 5;
    }

    .small-box .icon {
        color: rgba(0, 0, 0, .5);
        z-index: 0;
    }

    .small-box .icon>i {
        font-size: 90px;
        position: absolute;
        right: 15px;
        top: 15px;
        transition: all .3s linear;
    }

    .small-box>.small-box-footer {
        background: rgba(0, 0, 0, .2);
        color: rgba(255, 255, 255);
        display: block;
        padding: 3px 0;
        position: relative;
        text-align: center;
        text-decoration: none;
        z-index: 10;
    }

    .small-box .icon>i.ion {
        font-size: 50px;
        top: 20px;
    }

    .small-box>.small-box-footer:hover {
        background: rgba(0, 0, 0, 0.4);
        color: #fff;
    }
</style>