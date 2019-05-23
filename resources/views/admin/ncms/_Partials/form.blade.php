@csrf
<div class="form-group">
    <input type="text" value="{{ $ncm->code ?? old('code') }}" name="code" class="form-control" placeholder="Código">
</div>
<div class="form-group">
    <input type="text" value="{{ $ncm->url ?? old('url') }}" name="url" class="form-control" placeholder="URL">
</div>
<div class="form-group">
    <textarea type="text" name="description" class="form-control" cols="30" rows="10" placeholder="Descrição">{{ $ncm->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>