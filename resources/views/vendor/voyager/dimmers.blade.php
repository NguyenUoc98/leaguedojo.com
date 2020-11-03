@php
$dimmers = Voyager::dimmers();
$count = $dimmers->count();
$classes = [
    'col-xs-12',
    'col-sm-'.($count >= 3 ? '4' : '12'),
    'col-md-'.($count >= 4 ? '3' : ($count >= 2 ? '4' : '12')),
];
$class = implode(' ', $classes);
$prefix = "<div class='{$class}'>";
$surfix = '</div>';
@endphp
@if ($dimmers->any())
<div class="clearfix container-fluid">
    {!! $prefix.$dimmers->setSeparator($surfix.$prefix)->display().$surfix !!}
</div>
@endif
