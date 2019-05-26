@csrf
<div class="form-group">
    <input type="text" value="{{ $address->street ?? old('street') }}" name="street" class="form-control" placeholder="Rua">
</div>
<div class="form-group">
    <input type="text" value="{{ $address->url ?? old('url') }}" name="url" class="form-control" placeholder="URL">
</div>
<div class="form-group">
    <input type="text" value="{{ $address->number ?? old('number') }}" name="number" class="form-control" placeholder="Número">
</div>
<div class="form-group">
    <input type="text" value="{{ $address->neighborhood ?? old('neighborhood') }}" name="neighborhood" class="form-control" placeholder="Bairro">
</div>
<div class="form-group">
    <input type="text" value="{{ $address->complement ?? old('complement') }}" name="complement" class="form-control" placeholder="Complemento">
</div>
<div class="form-group">
    <input type="text" value="{{ $address->zipeCode ?? old('zipeCode') }}" name="zipeCode" class="form-control" placeholder="CEP">
</div>
<div class="form-group">
    <select name="city_id" class="form-control">
        <option value="">Escolha a Cidade</option>
        @foreach ($cities as $city)
            <option value="{{ $city->id }}"
                @if ($city->id == $address->city_id) selected @endif
                >{{ $city->title }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
        <select name="state_id" class="form-control">
            <option value="">Escolha o Estado</option>
            @foreach ($states as $state)
                <option value="{{ $state->id }}"
                    @if ($state->id == $address->state_id) selected @endif
                    >{{ $state->title }}</option>
            @endforeach
        </select>
    </div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>