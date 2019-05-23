@csrf
<div class="form-group">
    <input type="text" value="{{ $cfop->codigo ?? old('codigo') }}" name="codigo" class="form-control" placeholder="Código">
</div>
<div class="form-group">
    <input type="text" value="{{ $cfop->numseq ?? old('numseq') }}" name="numseq" class="form-control" placeholder="Número Seq">
</div>
<div class="form-group">
    <input type="text" value="{{ $cfop->description ?? old('description') }}" name="description" class="form-control" placeholder="Descrição">
</div>
<div class="form-group">
    <input type="text" value="{{ $cfop->ent_sai ?? old('ent_sai') }}" name="ent_sai" class="form-control" placeholder="Ent_Sai">
</div>
<div class="form-group">
    <input type="text" value="{{ $cfop->operacao ?? old('operacao') }}" name="operacao" class="form-control" placeholder="Operação">
</div>
<div class="form-group">
    <input type="text" value="{{ $cfop->descr_int ?? old('descr_int') }}" name="descr_int" class="form-control" placeholder="Descr_Int">
</div>
<div class="form-group">
    <input type="text" value="{{ $cfop->url ?? old('url') }}" name="url" class="form-control" placeholder="URL">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>