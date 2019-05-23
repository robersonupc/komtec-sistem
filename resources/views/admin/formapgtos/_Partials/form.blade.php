@csrf
<div class="form-group">
    <input type="text" value="{{ $formapgto->description ?? old('description') }}" name="description" class="form-control" placeholder="Descrição">
</div>
<div class="form-group">
    <input type="text" value="{{ $formapgto->parcela ?? old('parcela') }}" name="parcela" class="form-control" placeholder="Qtde Parcelas">
</div>
<div class="form-group">
    <input type="text" value="{{ $formapgto->prazoinicial ?? old('prazoinicial') }}" name="prazoinicial" class="form-control" placeholder="Prazo Inicial">
</div>
<div class="form-group">
    <input type="text" value="{{ $formapgto->diasentreparcelas ?? old('diasentreparcelas') }}" name="diasentreparcelas" class="form-control" placeholder="Dias Entre Parcelas">
</div>
<div class="form-group">
    <input type="text" value="{{ $formapgto->url ?? old('url') }}" name="url" class="form-control" placeholder="URL">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>