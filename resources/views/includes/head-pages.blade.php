@if(Request::get('page') > 0)
<link rel="next" href="{{ Request::url() }}?page={{ Request::get('page') + 1 }}">
@endif

@if(Request::get('page') > 2 && (Request::get('page') - 1) != 1)
<link rel="prev" href="{{ Request::url() }}?page={{ Request::get('page') - 1 }}">
@endif