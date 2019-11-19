<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<meta name="author" content="Gustavo Rizzon">
		<meta name="description" content="">

		<link rel="icon" href="favicon.ico">
		<link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/cover/">

		<title>{{ __('Membership Control System') }}</title>

		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('css/cover.css') }}">
	</head>
	<body>
		<div class="site-wrapper">
			<div class="site-wrapper-inner">
				<div class="cover-container">
					<div class="masthead clearfix">
						<div class="inner">
							<h3 class="masthead-brand"><b>{{ __('Membership Control') }}</b></h3>
							<nav>
								<ul class="nav masthead-nav">
									<li class="active">
										<a href="{{ url('/') }}">{{ __('Home') }}</a>
									</li>
									@auth
										<li>
											<a href="{{ url('/dashboard') }}">{{ __('Dashboard') }}</a>
										</li>
									@else
										<li>
											<a href="{{ route('login') }}">{{ __('Login') }}</a>
										</li>
										<li>
											<a href="{{ route('register') }}">{{ __('Register') }}</a>
										</li>
									@endauth
								</ul>
							</nav>
						</div>
					</div>
					
					<div class="inner cover">
						<h1 class="cover-heading">@lang('homepage.cover-heading')</h1>
						<p class="lead">@lang('homepage.lead')</p>
					</div>
					
					<div class="mastfoot">
						<div class="inner">
							<p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="{{ asset('js/app.js') }}"></script>
	</body>
</html>