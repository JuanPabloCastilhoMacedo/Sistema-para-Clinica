<h1>Editar Prescrições</h1>

<?php
	$sql = "SELECT * FROM prescricoes AS c
			INNER JOIN paciente AS p
			ON p.id_paciente = c.paciente_id_paciente
			WHERE id_prescricoes = ".$_REQUEST["id_prescricoes"];

	$res = $conn->query($sql);

	if ($res->num_rows > 0) {
        $row = $res->fetch_object();
    } else {
        die("Prescrição não encontrada.");
    }

?>
<form action="?page=salvar-prescricoes" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id_prescricoes" value="<?php print $row->id_prescricoes; ?>">
	<div class="mb-3">
		<label>Paciente</label>
		<select name="paciente_id_paciente" class="form-control">
			<option>-= Escolha um paciente =-</option>
			<?php
				$sql_1 = "SELECT * FROM paciente";
				$res_1 = $conn->query($sql_1);
				if($res_1->num_rows > 0){
					while($row_1 = $res_1->fetch_object()){
						if($row->paciente_id_paciente == $row_1->id_paciente){
							print "<option value='".$row_1->id_paciente."' selected>".$row_1->nome_paciente."</option>";
						}else{
							print "<option value='".$row_1->id_paciente."'>".$row_1->nome_paciente."</option>";
						}
					}
				}else{
					print "<option>Nenhum paciente cadastrado</option>";
				}
			?>
		</select>
	</div>
	<div class="mb-3">
		<label>Data de início da Prescrição</label>
		<input type="date" name="data_prescricao" class="form-control" value="<?php print $row->data_prescricao; ?>">
	</div>
	<div class="mb-3">
		<label>Dosagens e Medicamentos</label>
		<input type="text" name="dosagem_prescricao" class="form-control" value="<?php print $row->dosagem_prescricao; ?>">
	</div>
	<div class="mb-3">
		<label>Observação</label>
		<textarea name="descricao_prescricao" class="form-control"><?php print $row->descricao_prescricao; ?></textarea>
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-success">Salvar</button>
	</div>
</form>