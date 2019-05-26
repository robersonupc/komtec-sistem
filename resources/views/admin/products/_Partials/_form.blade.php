<div class="form-group">
    <input type="text" value="{{ $product->name ?? old('name') }}" name="name" class="form-control" placeholder="Nome">
</div>
<div class="form-group">
    <input type="text" value="{{ $product->code ?? old('code') }}" name="code" class="form-control" placeholder="Código">
</div>
<div class="form-group">
    <select name="ncm_id" class="form-control">
        <option value="">Escolha o NCM</option>
        @foreach ($ncms as $ncm)
            <option value="{{ $ncm->id  ?? old('id') }}"
                @if (isset($product->ncm_id) && $product->ncm_id == $ncm->id) selected @endif
                >{{ $ncm->code  ?? old('id') }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <select name="category_id" class="form-control">
        <option value="">Escolha a Categoria</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id  ?? old('id') }}"
                    @if (isset($product->category_id) && $product->category_id == $category->id) selected @endif
                >{{ $category->title  ?? old('id') }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <select name="brand_id" class="form-control">
        <option value="">Escolha a Marca</option>
        @foreach ($brands as $brand)
            <option value="{{ $brand->id  ?? old('id') }}"
                    @if (isset($product->brand_id) && $product->brand_id == $brand->id) selected @endif
                >{{ $brand->title  ?? old('id') }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <input type="text" value="{{ $product->codeManufacturer ?? old('codeManufacturer') }}" name="codeManufacturer" class="form-control" placeholder="Código Fabricante">
</div>
<div class="form-group">
    <input type="text" value="{{ $product->url ?? old('url') }}" name="url" class="form-control" placeholder="URL">
</div>
<div class="form-group">
    <input type="text" value="{{ $product->pricePurchase ?? old('pricePurchase') }}" name="pricePurchase" class="form-control" placeholder="Valor Compra">
</div>
<div class="form-group">
    <input type="text" value="{{ $product->margin ?? old('margin') }}" name="margin" class="form-control" placeholder="Margem">
</div>
<div class="form-group">
    <input type="text" value="{{ $product->priceSale ?? old('priceSale') }}" name="priceSale" class="form-control" placeholder="Valor Venda">
</div>
<div class="form-group">
    <input type="text" value="{{ $product->qty ?? old('qty') }}" name="qty" class="form-control" placeholder="Quantidade">
</div>
<div class="form-group">
    <textarea type="text" name="note" class="form-control" cols="30" rows="10" placeholder="Observação">{{ $product->note ?? old('note') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>