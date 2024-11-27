<h1>Cadastrar prescrições</h1>
<form action="?page=salvar-prescricoes" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Paciente</label>
		<select name="paciente_id_paciente" class="form-control">
			<option>-= Escolha um paciente =-</option>
			<?php
				$sql_1 = "SELECT * FROM paciente";

				$res_1 = $conn->query($sql_1);

				if($res_1->num_rows > 0){
					while($row_1 = $res_1->fetch_object()){
						print "<option value='".$row_1->id_paciente."'>".$row_1->nome_paciente."</option>";
					}
				}else{
					print "<option>Não há pacientes</option>";
				}
			?>
		</select>
	</div>
	
	</div>
	<div class="mb-3">
		<label>Data de início da Prescrição</label>
		<input type="date" name="data_prescricao" class="form-control">
	</div>
	<div class="mb-3">
		<label>Dosagens e Medicamentos</label>
		<input type="text" name="dosagem_prescricao" class="form-control">
	</div>
	<div class="mb-3">
		<label>Observação</label>
		<textarea name="descricao_prescricao" class="form-control"></textarea>
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-success">Salvar</button>
	</div>
</form>


