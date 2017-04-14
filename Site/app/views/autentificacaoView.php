<?php 
// Página de dados do cliente
if(false){ ?>
	<main class="panel">
		<div class="panel__header">
			<h3 class="panel__title">Dados do cliente</h3>
		</div>
		<div class="panel__body">		
			<form class="panel__form" action="">
				<label class="panel__label" for="cpf">CPF</label>
				<input class="panel__input" id="cpf" type="text" requerid>

				<label class="panel__label" for="name">Nome</label>
				<input class="panel__input" id="name" type="text" requerid>

				<label class="panel__label" for="email">E-mail</label>
				<input class="panel__input" id="email" type="email" requerid>

				<label class="panel__label" for="tel">Telefone</label>
				<input class="panel__input" id="tel" type="text" requerid>

				<label class="panel__label" for="ra">RA</label>
				<input class="panel__input panel__input--last" id="ra" type="text" requerid>

				<input class="panel__btn-main-action" type="submit" value="Avançar">
			</form>
			<a class="panel__voltar">Voltar</a>
		</div>
	</main>

<?php 
// Página de espera
} if(false) { ?>
	<main class="panel">
		<div class="panel__header">
			<h3 class="panel__title">Aguardando</h3>
		</div>
		<div class="panel__body">		
			<form class="panel__form" action="">
				<label class="panel__label--invisible" for="cpf">CPF</label>
				<input class="panel__input panel__input--line panel__input--alone" id="cpf" type="text" placeholder="CPF" requerid>

				<input class="panel__btn-main-action" type="submit" value="Avançar">
			</form>
		</div>
	</main>

<?php 
// Página do PIN
} if(true) { ?>
	<main class="panel">
		<div class="panel__header">
			<h3 class="panel__title">PIN</h3>
		</div>
		<div class="panel__body">		
				<em class="panel__input panel__input--line panel__input--alone panel__input--bigger">4811</em>

				<a class="panel__btn-main-action">Finalizar</a>
		</div>
	</main>
<?php } ?>