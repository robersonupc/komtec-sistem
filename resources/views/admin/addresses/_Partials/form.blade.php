@csrf
<div class="form-group">
    {{ Form::text('street', null, ['placeholder' => 'Rua', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('url', null, ['placeholder' => 'URL', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('number', null, ['placeholder' => 'Número', 'class' => 'form-control']) }}
</div>
<div class="form-group">    
    {{ Form::text('neighborhood', null, ['placeholder' => 'Bairro', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('complement', null, ['placeholder' => 'Complemento', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('zipeCode', null, ['placeholder' => 'CEP', 'class' => 'form-control']) }}
</div>
<div class="form-group">    
    {{ Form::select('city_id', $cities, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
        {{ Form::select('state_id', $states, null, ['class' => 'form-control']) }}
    </div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>