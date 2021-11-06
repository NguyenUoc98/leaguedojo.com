@php
    $dimmerGroups = Voyager::dimmers();
    $dimmers = [];

    if (count($dimmerGroups)) {
        $count = 0;
        foreach ($dimmerGroups as $dimmerGroup) {
            $dimmers[] = $dimmerGroup;
            $count += $dimmerGroup->count();
        }
        $classes = [
            'col-xs-12',
            'col-sm-'.($count >= 3 ? '4' : '12'),
            'col-md-'.($count >= 4 ? '3' : ($count >= 2 ? '4' : '12')),
        ];
        $class = implode(' ', $classes);
        $prefix = "<div class='{$class}'>";
        $surfix = '</div>';
    }
@endphp

<div class="clearfix container-fluid row">
@foreach($dimmers as $dimmerGroup)
    @if ($dimmerGroup->any())
        {!! $prefix.$dimmerGroup->setSeparator($surfix.$prefix)->display().$surfix !!}
    @endif
@endforeach
</div>

