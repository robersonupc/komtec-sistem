@csrf
<div class="form-group">
    <input type="text" value="{{ $city->title ?? old('title') }}" name="title" class="form-control" placeholder="Cidade">
</div>
<div class="form-group">
    <input type="text" value="{{ $city->url ?? old('url') }}" name="url" class="form-control" placeholder="URL">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>