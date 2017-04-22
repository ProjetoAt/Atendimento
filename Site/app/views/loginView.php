<main ng-controller="loginController">
	<div class="panel-login">		
		<div class="panel-login__header">
			<h3 class="panel-login__title">Login</h3>
		</div>
		<div class="panel-login__body">		
			<figure>
				<img class="panel-login__image" src="<?=$base?>app/www/out/images/foto-login.png" alt="">
			</figure>
			<form class="panel-login__form" method="POST">
				<label class="panel-login__label" for="user">Usuário</label>
				<input class="panel-login__input-text" id="user" name="usuario" type="text" placeholder="Usuário" ng-model="user.name" required>

				<label class="panel-login__label" for="password">Senha</label>
				<input class="panel-login__input-text" id="password" name="senha"  type="password" placeholder="Senha" required>

				<input class="panel-login__submit" name="enviar" type="submit" value="Continuar">
			</form>
			<h1>Hello {{user.name}}</h1>
		</div>
	</div>
</main>