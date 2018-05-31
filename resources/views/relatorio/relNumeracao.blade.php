<html>
    <head>
        <title>Numeração</title>
    </head>
    <style type="text/css">
        table {
            min-width: 700px;
            max-width: 700px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 2px;
        }
        th{
            text-align: center;
        }
    </style>
    <body>
    <center>
        <div style="max-width: 700px">
            <section class="">
            </section>
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
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Nome de guerra</th>
                    <th>Número</th>
                </tr>
                @if($estudantes)
                @foreach($estudantes as $estudante)
                <tr>
                    <td style="text-align: center;">{{$estudante->nome}}</td>
                    <td style="text-align: center;">{{$estudante->nomeDeGuerra}}</td>
                    <td style="text-align: center;">{{$estudante->numero}}</td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>
    </center>
    <div style="text-align: left">
        Porto Velho, {{date('d/m/Y')}}.<br>
    </div>
</body>

</html>

