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
				echo  "Parametro de comparação é ". $param; 
				if($param == "CH") $ext = "CH_cumprida desc;";
				if($param == "CR") $ext = "CR_atual desc;";
				if($param == "SEMESTRE") $ext = "semestre_atual desc;";
					
				
				$select = "select * from selecoes_candidatos where selecao_id = '$aux' order by ". $ext ;
				$query2 = $db->query($select);
					
				echo"<table>
				<tr>
				<th>Matricula</th>
				<th>Nome</th>
				<th>CR</th>
				<th>CH</th>
				<th>Semestre</th>
				</tr>";
				
				while($row2 = $query2->fetchArray(SQLITE3_ASSOC) ) {
					
					$cd = $row2['candidato_id'];
					$cr = $row2['CR_atual'];
					$ch = $row2['CH_cumprida'];
					$sem = $row2['semestre_atual'];
					
					$info = "select name, numero_matricula from informacoes_candidatos, users where id = '$cd' and usuario_id = id;";
					$query3 = $db->query($info);
					$row3 = $query3->fetchArray(SQLITE3_ASSOC);
					
					$mat = $row3['numero_matricula'];
					$nome = $row3['name'];
					
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
?>
</body>
</html>
