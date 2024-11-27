<h1>Listar Prescrições</h1>
<?php
	$sql = "SELECT * FROM prescricoes AS c
			INNER JOIN paciente AS p
			ON p.id_paciente = c.paciente_id_paciente";

	$res = $conn->query($sql);

	$qtd = $res->num_rows;

	if($qtd > 0){
		print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
		print "<table class='table table-bordered table-striped table-hover'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Paciente</th>";
		print "<th>Data de início da Prescrição</th>";
		print "<th>Dosagens e Medicamentos</th>";
		print "<th>Observação</th>";
		print "</tr>";
		while ($row = $res->fetch_object()) {
		    print "<tr>";
		    print "<td>" . $row->id_prescricoes . "</td>";
		    print "<td>" . $row->nome_paciente . "</td>";
		    print "<td>" . $row->data_prescricao . "</td>";
		    print "<td>" . $row->dosagem_prescricao . "</td>";
		    print "<td>" . $row->descricao_prescricao . "</td>";
		    print "<td>
		        <button class='btn btn-success' onclick=\"location.href='?page=editar-prescricoes&id_prescricoes=" . $row->id_prescricoes . "';\">Editar</button>
		        <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-prescricoes&acao=excluir&id_prescricoes=" . $row->id_prescricoes . "';}else{false;}\">Excluir</button>
		    </td>";
		    print "</tr>";
		}

		print "</table>";
	}else{
		print "Não encontrou resultado";
	}



	