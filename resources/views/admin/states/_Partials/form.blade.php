@csrf
<div class="form-group">
    <input type="text" value="{{ $state->title ?? old('title') }}" name="title" class="form-control" placeholder="Nome">
</div>
<div class="form-group">
    <input type="text" value="{{ $state->url ?? old('url') }}" name="url" class="form-control" placeholder="URL">
</div>
<div class="form-group">
    <input type="text" value="{{ $state->uf ?? old('uf') }}" name="uf" class="form-control" placeholder="UF">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>