<div class="form-group">
    {{ Form::text('name', null, ['placeholder' => 'Nome', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('code', null, ['placeholder' => 'Código', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::select('ncm_id', $ncms, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::select('brand_id', $brands, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('codeManufacturer', null, ['placeholder' => 'Código do Fabricante', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('url', null, ['placeholder' => 'URL', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('pricePurchase', null, ['placeholder' => 'Valor de Compra', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('margin', null, ['placeholder' => 'Margem', 'class' => 'form-control']) }}
</div>
<div class="form-group">
        {{ Form::text('priceSale', null, ['placeholder' => 'Valor de Venda', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::text('qty', null, ['placeholder' => 'Quantidade', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::textarea('note', null, ['placeholder' => 'Descrição', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>