@csrf
<div class="form-group">
    {{ Form::text('title', null, ['placeholder' => 'Cidade', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>