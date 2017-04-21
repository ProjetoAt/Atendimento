<main>
	<div class="panel-login">		
		<div class="panel-login__header">
			<h3 class="panel-login__title">Login</h3>
		</div>
		<div class="panel-login__body">		
			<figure>
				<img class="panel-login__image" src="<?=$base?>app/www/out/images/foto-login.png" alt="">
			</figure>
			<form class="panel-login__form" action="">
				<label class="panel-login__label" for="user">Usuário</label>
				<input class="panel-login__input-text" id="user" type="text" placeholder="Usuário" required>

				<label class="panel-login__label" for="password">Senha</label>
				<input class="panel-login__input-text" id="password" type="password" placeholder="Senha" required>

				<input class="panel-login__submit" type="submit" value="Continuar">
			</form>
		</div>
	</div>
</main>