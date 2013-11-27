<div class="container">
	<fieldset>
		<legend> Grupos Cadastrados </legend>		
		<form action="" method="POST">
			<table   class="table table-striped table-hover" width="100%" border="0">
				<tr>
					<th width="10%"> Código </th>
					<th width="70%"> Nome   </th>
					<th width="10%">  </th>
					<th width="10%">  </th>
				</tr>
				<?php foreach($this->grupos as $grupo): ?>
				<tr>
					<td align='center'> <?php echo $grupo->getIdGrupo() ?> </td>
					<td> <?php echo $grupo->getNome() ?> </td>
					<td> <a class='btn btn-primary' href="/Grupo/onCadastro/<?php echo $grupo->getIdGrupo() ?>"><span class='glyphicon glyphicon-pencil'></span> Alterar</a></td>
					<td> <a class='btn btn-danger' href="/Grupo/onDelete/<?php echo $grupo->getIdGrupo() ?>"><span class='glyphicon glyphicon-trash'></span> Excluir</a></td>
				</tr>
				<?php endforeach; ?>	
			</table>
			<div align="right">	
				<a class="btn btn-warning" href=""/> <span class='glyphicon glyphicon-plus'></span> Novo Grupo</a>
			</div>
		</form>
	</fieldset>	
</div>