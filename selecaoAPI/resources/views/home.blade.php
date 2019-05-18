@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Seleções </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Exatamente aqui as seleções com a tabela front end. Boa sorte! <br/>
                    Criem e coloquem scripts na pasta /public/js. <br/>
                    Criem e coloquem estilos na pasta /public/css. <br/>
                    Importem os dois aqui mesmo (Me refiro dentro da view) com tags html &lt;link/&gt; e &lt;script/&gt; . <br/>
                    <a href="https://getbootstrap.com.br/docs/4.1/components/"> Usem e abusem de bootstrap! </a> <br/>
                    <a href="https://laravel.com/docs/5.8/blade"> Podem usar blade a vontade também! </a> <br/>
                    Qualquer coisa pergunta no grupo. Ainda vamos fazer a API e as actions.
                    
                    
                     <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Seleção</th>
                            <th scope="col">Número de participantes</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                    
                    <?php
                    class Banco extends SQLite3 {
                        function __construct() {
                            $this->open('/home/1uuc4asb/Desktop/sistemaSelecaoBolsaWEB/selecaoAPI/database/selecaoDatabase.db');
                        }
                    }
                    $db = new Banco(); //Isso deve fazer a conexão com o banco pra puxar os regsitros da tabela 'selecoes'
                    if(!$db) echo $db->lastErrorMsg(); //Essa mensagem de erro aparece?
                            
                            /*
                            o while seria mais ou menos assim, tem que ver ainda o número de participantes.
                            O botão inscrever-se seria um link pro form de inscrição passando o id da seleção.
                            */
                            $select ='SELECT * from selecoes;';
                            $ret = $db->query($select);
				            while($row = $ret->fetchArray(SQLITE3_ASSOC)) {
					            $nome = $row['nome'];
                                $id = $row['id'];
                                
                                //Faz a contagem de todas ocorrências do id da seleção na tabela selecoes_candidatos.
                                $count = 'SELECT count(*) as total from selecoes_candidatos where selecao_id ='. $id;
				                $retc = $db->query($count);
				                $res = $retc->fetchArray(SQLITE3_ASSOC);
                                $qtd = $res['total'];
                
					            echo "<tr><th scope='row'>$id</th>
                                <td>$nome</td>
                                <td>$qtd</td>
                                <td style='text-align: right;'> <button type='submit' formaction='inscricaoSelecao.blade.php?id=$id' class='btn btn-primary'> Increver-se </button> </td></tr>";
				             }
                          ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
