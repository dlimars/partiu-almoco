<html>
    <head>
        <title>#PartiuAlmoco</title>
        <meta charset="utf-8" />
        <script type="text/javascript" src="/assets/js/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/assets/js/angular.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/todc-bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/layout.css">
    </head>
    <body>

		@include("partials.navbar")

		<div class="container">
            @if(Session::has("login_error"))
                <div class="alert alert-danger">
                    {{ Session::get("login_error") }}
                </div>
            @endif

			@yield("contents")
		</div>
	</body>
</html>
