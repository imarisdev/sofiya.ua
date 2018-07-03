<input type="hidden" name="seo[id]" value="{{ $item->id or '' }}">
<input type="hidden" name="seo[object_id]" value="{{ $item_id or '' }}">
<input type="hidden" name="seo[object_type]" value="{{ $item_type or '' }}">
<div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="seo[title]" value="{{ $item->title or '' }}">
</div>
<div class="form-group">
    <label>Description</label>
    <textarea rows="5" type="text" class="form-control" name="seo[description]" >{{ $item->description or '' }}</textarea>
</div>
<div class="form-group">
    <label>Keywords</label>
    <input type="text" class="form-control" name="seo[keywords]" value="{{ $item->keywords or '' }}">
</div>
<div class="form-group">
    <label>H1</label>
    <input type="text" class="form-control" name="seo[h1]" value="{{ $item->h1 or '' }}">
</div>
<div class="form-group">
    <label>Content</label>
    <textarea rows="5" type="text" class="form-control" name="seo[content]">{{ $item->content or '' }}</textarea>
</div>
@if(isset($item->id))
    <div class="form-group">
        <a target="_blank" href="{{ route('admin.seo.edit', ['id' => $item->id]) }}" class="btn btn-primary">Редактировать</a>
    </div>
@endif