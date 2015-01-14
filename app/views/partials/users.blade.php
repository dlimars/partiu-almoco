<div class="text-muted">
	<h3>Usuários</h3>

	<ul>
		@foreach(User::all() as $user)
			<li>{{ $user->email }}</li>
		@endforeach
	</ul>
	Senha: <b>123</b>
</div>