@csrf
<div class="form-group">
    {{ Form::text('code', null, ['placeholder' => 'Código', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('numseq', null, ['placeholder' => 'Número Seq', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('description', null, ['placeholder' => 'Descrição', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('ent_sai', null, ['placeholder' => 'Ent_Sai', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('operacao', null, ['placeholder' => 'Operação', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('descr_int', null, ['placeholder' => 'Descr_Int', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>