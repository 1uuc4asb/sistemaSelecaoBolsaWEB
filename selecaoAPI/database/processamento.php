<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	<body>
<?php
	//conexão
   class Banco extends SQLite3 {
      function __construct() {
         $this->open('selecaoDatabase.db');
      }
   }
   $db = new Banco();
   if(!$db){
      echo $db->lastErrorMsg();
   }
   else{
		$id = "";
		if(isset($_REQUEST['id']))$id=$_REQUEST['id'];
		
		$teste = "select * from selecoes;";
		$query1 = $db->query($teste);
		$check = 0;
		
		while($row1 = $query1->fetchArray(SQLITE3_ASSOC) ) {
			$aux = $row1['id'];
			if($aux == $id){
					
				// verifica parametro de comparação da seleção definida pelo id.
				$param = $row1['parametro_de_comparacao'];
				echo  "Parametro de comparação é ". $param;  //ilustrativo
				if($param == "CH") $ext = "CH_cumprida desc;";
				if($param == "CR") $ext = "CR_atual desc;";
				if($param == "SEMESTRE") $ext = "semestre_atual desc;";
					
				//query da seleção pode ser assim.
				$select = "select numero_matricula, name, CR_atual, CH_cumprida, semestre_atual from informacoes_candidatos, users, (select * from selecoes_candidatos where selecao_id = '$id') as candidatos where users.id = candidatos.candidato_id and users.id = informacoes_candidatos.usuario_id  order by ". $ext;
				$query2 = $db->query($select);
					
				echo"<table>
				<tr>
				<th>MATRICULA</th>
				<th>NOME</th>
				<th>CR</th>
				<th>CH</th>
				<th>SEMESTRE</th>
				</tr>";
				while($row2 = $query2->fetchArray(SQLITE3_ASSOC) ) {
					$mat = $row2['numero_matricula'];
					$nome = $row2['name'];
					$cr = $row2['CR_atual'];
					$ch = $row2['CH_cumprida'];
					$sem = $row2['semestre_atual'];
					echo "<tr>
					<td>$mat</td>
					<td>$nome</td>
					<td>$cr</td>
					<td>$ch</td>
					<td>$sem</td>
					</tr>";
				}
				echo"</table>";
				$check = 1;
				break;
			}
		}
		if($check == 0) echo "Seleção não encontrada.";
	}
	$db->close();
   
/*
RASCUNHOS
(select * from selecoes_candidatos where selecao_id = '$id') as candidatos					"candidato_id, CR_atual, CH_cumprida, semestre_atual"
(select * from selecoes where id = '$id') as parametros										"parametro_de_comparacao"
select * from informacoes_candidatos;

select informacoes_candidatos.numero_matricula, users.name, candidatos.CR_atual, candidatos.CH_cumprida, candidatos.semestre_atual
	from informacoes_candidatos,users,(select * from selecoes_candidatos where selecao_id = '$id') as candidatos,(select * from selecoes where id = '$id') as parametros  where users.id = candidatos.candidato_id and users.id = informacoes_candidatos.usuario_id 

	select informacoes_candidatos.numero_matricula, users.name from informacoes_candidatos,users,(select * from selecoes_candidatos where selecao_id = '$id') as candidatos where users.id = candidatos.candidato_id and users.id = informacoes_candidatos.usuario_id 
*/

?>
</body>
</html>



 
