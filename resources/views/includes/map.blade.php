@if($current_complex && !empty($current_complex->map))
    {!! $current_complex->map !!}
@else
    {!! $options['default_map'] or '' !!}
@endif