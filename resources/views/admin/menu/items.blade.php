<li data-id="{{ $item['id'] }}" data-parent="{{ $item['parent'] }}" class="menu-item-handle menu-{{ $item['id'] }}">
    <div class="sortable">
        <div class="row">
            <div class="col-md-8">
                <span>{{ $item['title'] }}</span>
                <input type="hidden" name="menu_item_parent[{{ $item['id'] }}]" value="{{ $item['parent'] }}">
                <input type="hidden" name="menu_item_sort[{{ $item['id'] }}]" value="{{ $item['sort'] }}">
            </div>
            <div class="col-md-4">
                <a target="_blank" href="/admin/menu/edit/{{ $item['id'] }}" class="btn btn-primary btn-xs clickable">Редактировать</a>
                @if(empty($item['child']))
                    <a target="_blank" href="#" data-id="{{ $item['id'] }}" data-action="/admin/menu" data-type="menu" data-reload="false" class="btn btn-danger btn-xs pull-right js-delete-item clickable">Удалить</a>
                @endif
            </div>
        </div>
    </div>
    @if(!empty($item['child']))
        <ul class="child-sortable">
            @each('admin.menu.items', $item['child'], 'item')
        </ul>
    @endif
</li>
