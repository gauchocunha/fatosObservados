<div class="form-group">
    <label for="idTransgressao" class="col-sm-2 control-label">Alteração <small class="vm"> *</small></label>
    <div class="col-sm-10">
        <select name="idTransgressao" id="idTransgressao" class="form-control campo tabula">
            <option value="">Selecione...</option>
            @if($transgressoes)
            @foreach($transgressoes as $transgressao)
            <option value="{{$transgressao->id}}">{{$transgressao->nome}}</option>
            @endforeach
            @endif
        </select>
    </div>
</div>
