<div class="form-group">
    <label for="idEstudante" class="col-sm-2 control-label">Estudante <small class="vm"> *</small></label>
    <div class="col-sm-10">
        <select name="idEstudante" id="idEstudante" class="form-control campo tabula">
            <option value="">Selecione...</option>
            @if($estudantes)
            @foreach($estudantes as $estudante)
            <option value="{{$estudante->id}}">{{$estudante->nome}}</option>
            @endforeach
            @endif
        </select>
    </div>
</div>
