<html>
    <head>
        <title>Alterações</title>
    </head>
    <body>
    <center>
        <div style="max-width: 700px">
            <img src="/var/www/html/fatosObservados/public/images/logoro.png" style="max-width: 90px; max-height: 90px;"/>
            <p style="text-align:center; text-height: 20px;">
                GOVERNO DO ESTADO DE RONDÔNIA<br>
                SECRETARIA DE ESTADO DA EDUCAÇÃO<br>
                SECRETARIA DE SEGURANÇA, DEFESA E CIDADANIA<br>
                @if($escola)
                {{$escola[0]->subordinacao}}<br>
                {{$escola[0]->nome}}<br>
                {{$escola[0]->decreto}}
                @endif
            </p>
            @if($elogios)

            <table>
                <tr>
                    <th>Referência elogiosa</th>
                    <th>Data</th>
                    <th>Pontuação</th>
                </tr>

                @foreach($elogios as $elogio)
                <tr>
                    <td style="text-align: center;">{{$elogio->transgressao}}</td>
                    <td style="text-align: center;">{{$elogio->data}}</td>
                    <td style="text-align: center;">{{$elogio->pontuacao}}</td>
                </tr>

                @endforeach
            </table>
            @endif

            @if($transgressoes)
            @php
    $totalTransgressoes = 0
@endphp

            <table>
                <tr>
                    <th>Alteração</th>
                    <th>Data</th>
                    <th>Pontuação</th>
                </tr>
                @foreach($transgressoes as $transgressao)
                <tr>
                    <td style="text-align: center;">{{$transgressao->transgressao}}</td>
                    <td style="text-align: center;">{{$transgressao->data}}</td>
                    <td style="text-align: center;">{{$transgressao->pontuacao}}</td>
                </tr>
                @php
     $totalTransgressoes += $transgressao->pontuacao
@endphp

                @endforeach

            </table>

            @endif


{{$totalTransgressoes}}


        </div>

    </center>

    <div style="text-align: left">

    </div>
</body>
</html>




