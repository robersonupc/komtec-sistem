@csrf
<div class="form-group">
    <input type="text" value="{{ $icms->uf ?? old('uf') }}" name="uf" class="form-control" placeholder="UF">
</div>
<div class="form-group">
    <input type="text" value="{{ $icms->description ?? old('description') }}" name="description" class="form-control" placeholder="Descrição">
</div>
<div class="form-group">
    <input type="text" value="{{ $icms->aliqicms ?? old('aliqicms') }}" name="aliqicms" class="form-control" placeholder="Aliquota">
</div>
<div class="form-group">
    <input type="text" value="{{ $icms->url ?? old('url') }}" name="url" class="form-control" placeholder="URL">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>