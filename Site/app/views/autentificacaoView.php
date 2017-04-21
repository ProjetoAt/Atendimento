<?php 
// Página de dados do cliente
if(true){ ?>
	<main>		
		<div class="panel-data">
			<div class="panel-data__header">
				<h3 class="panel-data__title">Dados do cliente</h3>
			</div>
			<div class="panel-data__body">		
				<form class="panel-data__form" action="">				
					<label class="panel-data__label" for="cpf">CPF</label>
					<input class="panel-data__input-text" id="cpf" type="text" requerid>

					<label class="panel-data__label" for="name">Nome</label>
					<input class="panel-data__input-text" id="name" type="text" requerid>

					<label class="panel-data__label" for="email">E-mail</label>
					<input class="panel-data__input-text" id="email" type="email" requerid>

					<label class="panel-data__label" for="tel">Telefone</label>
					<input class="panel-data__input-text" id="tel" type="text" requerid>

					<label class="panel-data__label" for="ra">RA</label>
					<input class="panel-data__input-text" id="ra" type="text" requerid>

					<input class="panel-data__submit" type="submit" value="Avançar">
				</form>
				<a class="panel-data__voltar">Voltar</a>
			</div>
		</div>
	</main>

<?php 
// Página de espera
} if(false) { ?>
	<main>		
		<div class="panel-simple">
			<div class="panel-simple__header">
				<h3 class="panel-simple__title">Aguardando</h3>
			</div>
			<div class="panel-simple__body">		
				<form class="panel-simple__form" action="">
					<label class="panel-simple__label" for="cpf">CPF</label>
					<input class="panel-simple__input-text" id="cpf" type="text" placeholder="CPF" requerid>

					<input class="panel-simple__submit" type="submit" value="Avançar">
				</form>
			</div>
		</div>
	</main>

<?php 
// Página do PIN
} if(false) { ?>
	<main>
		<div class="panel-simple">
			<div class="panel-simple__header">
				<h3 class="panel-simple__title">PIN</h3>
			</div>
			<div class="panel-simple__body">		
					<em class="panel-simple__input-text">4811</em>

					<a class="panel-simple__submit">Finalizar</a>
			</div>
		</div>
	</main>
<?php } ?>