<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">#PartiuAlmoco</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-navbar-collapse">
			@if(Auth::check())
				<p class="navbar-text navbar-right">
					Logado como <a href="{{ URL::to("login/logout") }}" class="navbar-link"><b title="Clique para sair">{{Auth::user()->name}}</b></a>
				</p>
			@else
				{{ Form::open(["url" => "login/login", "class" => "navbar-form navbar-right"]) }}
					<div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="Email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Senha">
					</div>
					<button type="submit" class="btn btn-default">Entrar</button>
				{{ Form::close() }}
			@endif
		</div>
	</div>
</nav>