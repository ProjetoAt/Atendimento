<main class="panel">
	<div class="panel__header">
		<h3 class="panel__title">Login</h3>
	</div>
	<div class="panel__body">		
		<figure>
			<img class="panel__image" src="<?=$base?>app/www/images/foto-login.png" alt="">
		</figure>
		<form class="panel__form" action="">
			<label class="panel__label panel__label--invisible" for="user">Usuário</label>
			<input class="panel__input panel__input--line" id="user" type="text" placeholder="Usuário">

			<label class="panel__label panel__label--invisible" for="password">Senha</label>
			<input class="panel__input panel__input--line" id="password" type="password" placeholder="Senha">

			<input class="panel__submit" type="submit" value="Entrar">
		</form>
	</div>
</main>