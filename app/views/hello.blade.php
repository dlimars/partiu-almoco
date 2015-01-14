@extends("template.base")

@section("contents")

	<div class="text-center" id="PartiuAlmoco">
		#PartiuAlmoco
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1">
			@include("partials.users")
		</div>
		<div class="col-xs-offset-1 col-xs-8 col-sm-offset-2 col-sm-6 col-md-offset-3 col-md-4">
			@if(isset($most_voted))
				<div class="thumbnail">
					<img src="/assets/img/medalha.png" class="medalha" />
					<img src="{{ $most_voted->logo_path }}" />
					<div class="caption">
						<h1>{{ $most_voted->name }}</h1>
						<p>
							{{ $most_voted->description }}
						</p>
					</div>
				</div>
			@else
				<div class="thumbnail">
					<img src="/assets/img/restaurants/no-photo.jpg">
					<div class="caption">
						@if(isset($undefined_voting) && $undefined_voting)
							<h1>Nenhum restaurante definido hoje</h1>
							<p>Volte amanhã e ajude a escolher o melhor restaurante</p>
						@elseif(App::make("userHasVoted"))
							<h1>Voto computado</h1>
							<p>Aguarde até as {{ Config::get('app.time_to_vote') }} para saber o restaurante preferido</p>
						@else
							<h1>Ainda há tempo de votar ...</h1>
						@endif
					</div>
			@endif
			@if (Auth::check())
				@if(isset($most_voted) || isset($undefined_voting) || App::make("userHasVoted"))
					<button class="btn btn-primary btn-block disabled">
						Escolher um restaurante
					</button>
				@else
					<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#restaurant-voting">
						Escolher um restaurante
					</button>
				@endif
			@else
				<button class="btn btn-primary btn-block disabled" title="teste">
					Escolher um restaurante
				</button>
			@endif
			<small>
				A escolha do restaurante deve ser feita até às {{ date("H:i", strtotime(Config::get('app.time_to_vote'))) }} de cada dia
			</small>
		</div>
	</div>

	@include("partials.modal-restaurants")

@stop