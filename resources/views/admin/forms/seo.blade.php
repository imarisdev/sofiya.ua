<input type="hidden" name="seo_id" value="{{ $item->id or '' }}">
<div class="form-group">
    <label for="seo_title">Title</label>
    <input type="text" class="form-control" id="seo_title" name="seo_title"
           placeholder="Title"
           value="{{ $item->title or '' }}">
</div>
<div class="form-group">
    <label for="seo_description">Description</label>
    <textarea rows="5" type="text" class="form-control" id="seo_description" name="seo_description"
              placeholder="Description">{{ $item->description or '' }}</textarea>
</div>
<div class="form-group">
    <label for="seo_keywords">Keywords</label>
    <input type="text" class="form-control" id="seo_keywords" name="seo_keywords"
           placeholder="Keywords"
           value="{{ $item->keywords or '' }}">
</div>
<div class="form-group">
    <label for="seo_h1">H1</label>
    <input type="text" class="form-control" id="seo_h1" name="seo_h1"
           placeholder="H1"
           value="{{ $item->seo_h1 or '' }}">
</div>
<div class="form-group">
    <label for="seo_content">Content</label>
    <textarea rows="5" type="text" class="form-control" id="seo_content" name="seo_content"
              placeholder="Content">{{ $item->seo_content or '' }}</textarea>
</div>