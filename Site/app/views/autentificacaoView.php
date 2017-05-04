<?php 
// Página do PIN
if(isset($etapa) and $etapa == 1) { ?>
	<main>		
		<div class="panel-simple">
			<div class="panel-simple__header">
				<h3 class="panel-simple__title">Aguardando</h3>
			</div>
			<div class="panel-simple__body">		
				<form class="panel-simple__form" method="POST">
					<label class="panel-simple__label" for="cpf">CPF</label>
					<input class="panel-simple__input-text" id="cpf" type="text" name="cpf" placeholder="CPF" <?= (isset($cpf)) ? 'value="'.$cpf.'"' : '' ;?>>

					<input class="panel-simple__submit" type="submit" name="verificar" value="Avançar">
				</form>
			</div>
		</div>
	</main>
<?php 
//Pagina dos Dados
}elseif(isset($etapa) and $etapa == 2) { ?>
	<main>		
		<div class="panel-data">
			<div class="panel-data__header">
				<h3 class="panel-data__title">Dados do cliente</h3>
			</div>
			<div class="panel-data__body">		
				<form class="panel-data__form" method="POST">				
					<label class="panel-data__label" for="cpf">CPF</label>
					<input class="panel-data__input-text" id="cpf" type="text" name="cpf" value="<?=$clientesModel->getCpf()?>">

					<label class="panel-data__label" for="name">Nome</label>
					<input class="panel-data__input-text" id="name" type="text" name="nome" value="<?=$clientesModel->getNome()?>">

					<label class="panel-data__label" for="email">E-mail</label>
					<input class="panel-data__input-text" id="email" type="email" name="email" value="<?=$clientesModel->getEmail()?>">

					<label class="panel-data__label" for="tel">Telefone</label>
					<input class="panel-data__input-text" id="tel" type="text" name="telefone" value="<?=$clientesModel->getTelefone()?>">

					<label class="panel-data__label" for="ra">RA</label>
					<input class="panel-data__input-text" id="ra" type="text" name="ra" value="<?=$clientesModel->getRa()?>">

<<<<<<< HEAD
				<input class="panel-data__submit" type="submit" name="enviar" value="Avançar">
			</form>
			<form method="POST">	
				<input class="panel-data__voltar" type="submit" name="voltar" value="voltar">
			</form>
=======
					<input class="panel-data__submit" type="submit" name="enviar" value="Avançar">
					<input class="panel-data__voltar" type="submit" name="voltar" value="Finalizar">
				</form>
			</div>
>>>>>>> 07a6fca415d9c5cf0a6d728de48c22502b107de3
		</div>
	</main>
<?php 
// Página de espera
}elseif(isset($etapa) and $etapa == 3) { ?>
	<main>
		<div class="panel-simple">
			<div class="panel-simple__header">
				<h3 class="panel-simple__title">PIN</h3>
			</div>
			<div class="panel-simple__body">		
				<em class="panel-simple__input-text">4811</em>

<<<<<<< HEAD
			<form class="panel-simple__form" method="POST">	
				<input class="panel-simple__submit" value="Finalizar" type="submit" name="finalizar">
			</form>
=======
				<form class="panel-data__form" method="POST">	
					<input class="panel-data__submit" type="submit" name="finalizar" value="Finalizar">
				</form>
			</div>
>>>>>>> 07a6fca415d9c5cf0a6d728de48c22502b107de3
		</div>
	</main>
<?php
}
?>