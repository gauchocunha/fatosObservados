
        <select name="usuario" id="usuario" class="form-control campo">
            <option value="">Selecione...</option>
            @if($usuarios)
            @foreach($usuarios as $usuario)
            <option value="{{$usuario->name}}+{{$usuario->funcao}}">{{$usuario->name}}</option>
            @endforeach
            @endif
        </select>

