<div class="form-group">
    {{ Form::text('description', null, ['placeholder' => 'Descrição', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('parcela', null, ['placeholder' => 'Parcela', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('prazoinicial', null, ['placeholder' => 'Prazo Inicial', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('diasentreparcelas', null, ['placeholder' => 'Dias Entre Parcelas', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>