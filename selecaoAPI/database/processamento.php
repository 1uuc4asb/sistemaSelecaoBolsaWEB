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
		@$id = $_POST['id'];
		
		// verifica parametro de comparação da seleção definida pelo id.
		$parametro = "select parametro_de_comparacao from selecoes where id = '$id';";
		$md = $db->query($parametro);
		$row = $md->fetchArray(SQLITE3_ASSOC);
		$param = $row['parametro_de_comparacao'];
		echo  "Parametro de comparação é ". $param;  //ilustrativo
		if($param == "CH") $ext = "CH_cumprida desc;";
		if($param == "CR") $ext = "CR_atual desc;";
		if($param == "SEMESTRE") $ext = "semestre_atual desc;";
		
		//query da seleção pode ser assim.
		$select = "select numero_matricula, name, CR_atual, CH_cumprida, semestre_atual from informacoes_candidatos, users, (select * from selecoes_candidatos where selecao_id = '$id') as candidatos where users.id = candidatos.candidato_id and users.id = informacoes_candidatos.usuario_id  order by ". $ext;
		
		$ret3 = $db->query($select);
		echo"<table border='0'>
			<tr>
			<th>MATRICULA</th>
			<th>NOME</th>
			<th>CR</th>
			<th>CH</th>
			<th>SEMESTRE</th>
			</tr>";
		while($row = $ret3->fetchArray(SQLITE3_ASSOC) ) {
			$mat = $row['numero_matricula'];
			$nome = $row['name'];
			$cr = $row['CR_atual'];
			$ch = $row['CH_cumprida'];
			$sem = $row['semestre_atual'];
			echo "<tr>
				<td>$mat</td>
				<td>$nome</td>
				<td>$cr</td>
				<td>$ch</td>
				<td>$sem</td>
				</tr>";
		}
		echo"</table>";
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



 
