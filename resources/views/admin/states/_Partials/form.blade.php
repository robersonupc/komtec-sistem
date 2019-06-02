<div class="form-group">
    {{ Form::text('title', null, ['placeholder' => 'Descrição', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('uf', null, ['placeholder' => 'UF', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>