@extends("template.base")

@section("contents")

	<div class="text-center" id="PartiuAlmoco">
		#PartiuAlmoco
	</div>
	<div class="row">
		<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
			<hr />
			<div class="thumbnail">
				<img src="/assets/img/restaurants/restaurant_1.jpg">
				<div class="caption">
					<h1>Pizza Mia</h1>
					<p>
						Restaurante com comidas tropicais
					</p>
				</div>
			</div>
			@if (Auth::check())
				<button class="btn btn-primary btn-block">
					Escolher um restaurante
				</button>
			@else
				<button class="btn btn-primary btn-block disabled" title="teste">
					Escolher um restaurante
				</button>
			@endif
			<small>
				A escolha do restaurante é até as 11:30 de cada dia
			</small>
		</div>
	</div>

@stop