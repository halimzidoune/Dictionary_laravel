<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- csrf token -->
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<title>Dictionnaire</title>
	
	<!-- Bootstrap 4 -->
	<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    
 	<!-- Cod Box Copy begin -->
    <link href="{{ asset('/js/prism/prism.css') }}" rel="stylesheet">
    <link href="{{ asset('/js/code-box-copy/css/code-box-copy.css') }}" rel="stylesheet">

    <!-- basic script -->
    <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
</head>

<body>
	<!-- begin navbar-->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<div class="container">
			<a href="{{ route('projects.index') }}" class="navbar-brand">Dictionnaire</a>
			<button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="menu">
				<ul class="navbar-nav">
					<li class="navbar-item">
						<a href="{{ route('projects.index') }}" class="nav-link">Projects</a>
					</li>

				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		@if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

		@yield('content')
	</div>

	<script src="{{ asset('/js/prism/prism.js') }}"></script>
	<script src="{{ asset('/js/clipboard/clipboard.min.js') }}"></script>
	<script src="{{ asset('/js/code-box-copy/js/code-box-copy.js') }}"></script>
	<!-- Cod Box Copy end -->
	<script>
		$(document).ready(function () {
		    $('.code-box-copy').codeBoxCopy({
		        tooltipText: 'Copied',
		        tooltipShowTime: 1000,
		        tooltipFadeInTime: 300,
		        tooltipFadeOutTime: 300
		    });

		    $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });

            $(".table-row").css('cursor', 'pointer');

		});
	</script>
	
</body>
</html>