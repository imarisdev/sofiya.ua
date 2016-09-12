@if(!empty($item) && count($item) > 0)
<div class="cell m_b-30 m_t-20">
    <div class="fl_r">
    {!! $item->setPath(Request::url())->appends(Request::query())->render() !!}
        <!--span class="nav-item prev"></span>
        <span class="nav-item">1</span>
        <a class="nav-item">2</a>
        <a class="nav-item">3</a>
        <a class="nav-item">4</a>
        <a class="nav-item next"></a-->
    </div>
</div>
@endif