<?php
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$paciente = $_POST['paciente_id_paciente'];
			$data = $_POST['data_prescricao'];
			$dosagem = $_POST['dosagem_prescricao'];
			$descricao = $_POST['descricao_prescricao'];

			$sql = "INSERT INTO prescricoes (paciente_id_paciente, data_prescricao, dosagem_prescricao, descricao_prescricao) VALUES ('{$paciente}', '{$data}', '{$dosagem}', '{$descricao}')";

			$res = $conn->query($sql);

			if($res==true){
				print "<script>alert('Cadastrou com sucesso!');</script>";
				print "<script>location.href='?page=listar-prescricoes';</script>";
			}else{
				print "<script>alert('Deu errado!');</script>";
				print "<script>location.href='?page=listar-prescricoes';</script>";
			}
			break;
		
		case 'editar':
			$paciente = $_POST['paciente_id_paciente'];
			$data = $_POST['data_prescricao'];
			$dosagem = $_POST['dosagem_prescricao'];
			$descricao = $_POST['descricao_prescricao'];

			$sql = "UPDATE prescricoes SET 
						paciente_id_paciente='{$paciente}',  
						data_prescricao='{$data}', 
						dosagem_prescricao='{$dosagem}', 
						descricao_prescricao='{$descricao}'
					WHERE id_prescricoes=".$_REQUEST['id_prescricoes'];

			$res = $conn->query($sql);

			if($res==true){
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='?page=listar-prescricoes';</script>";
			}else{
				print "<script>alert('Deu errado!');</script>";
				print "<script>location.href='?page=listar-prescricoes';</script>";
			}
			break;

		case 'excluir':
			$sql = "DELETE FROM prescricoes
					WHERE id_prescricoes=".$_REQUEST['id_prescricoes'];

			$res = $conn->query($sql);

			if($res==true){
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-prescricoes';</script>";
			}else{
				print "<script>alert('Deu errado!');</script>";
				print "<script>location.href='?page=listar-prescricoes';</script>";
			}
			break;
	}