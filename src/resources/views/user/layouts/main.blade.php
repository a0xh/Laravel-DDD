<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>
			{{ '«' . config('app.name') . '»' }} — {{ __('блог back-end (PHP) разработчика') }}
		</title>

		<link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}">
		<link rel="stylesheet" href="{{ asset('css/main.css') }}">

		<script src="{{ asset('js/uikit.js') }}"></script>
	</head>

	<body>
		<div data-uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent; top: 200">
			<nav class="uk-navbar-container">
				<div class="uk-container uk-container-xsmall">
					<div data-uk-navbar>

						<div class="uk-navbar-left">
							<a href="{{ route('home') }}" class="uk-navbar-item uk-logo uk-visible@m">
								{{ '@' . config('app.name') }}
							</a>
						</div>

						<div class="uk-navbar-center">
							<ul class="uk-navbar-nav uk-visible@m">
								<li><a href="{{ url('/about') }}">{{ __('Обо мне') }}</a></li>
								<li>
									<a href="javascript:void(0);">{{ __('Рубрики') }}</a>
									<div class="uk-navbar-dropdown">
										<ul class="uk-nav uk-navbar-dropdown-nav">
											<li>
												<a href="{{ url('/ddd') }}">
													{{ __('— Clean Architecture') }}
												</a>
											</li>
											<li>
												<a href="{{ url('/laravel') }}">
													{{ __('— Framework Laravel') }}
												</a>
											</li>
											<li>
												<a href="{{ url('/php') }}">
													{{ __('— Theory/Principles') }}
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li><a href="{{ url('/contact') }}">{{ __('Контакты') }}</a></li>
							</ul>
						</div>

						<div class="uk-navbar-left uk-hidden@m">
							<a href="{{ route('home') }}" class="uk-navbar-item uk-logo" style="margin-left: 9%;">
								{{ config('app.name') }}
							</a>
						</div>

						<div class="uk-navbar-right">
							<ul class="uk-navbar-nav uk-visible@m">
								<li>
									<div class="uk-navbar-item">
				                        @guest
				                            @if (Route::has('login'))
					                            <a href="{{ route('login') }}" class="uk-button uk-button-success">
					                            	{{ __('Авторизация') }}
					                            </a>
				                            @endif
				                        @else
					                        @if (Route::has('admin.index'))
						                        <a href="{{ route('admin.index') }}" class="uk-button uk-button-success">
						                        	{{ __('Панель управления') }}
						                        </a>
						                    @else
						                    	<a href="#" class="uk-button uk-button-success">
						                        	{{ __('Подписаться') }}
						                        </a>
					                        @endif
				                        @endguest
									</div>
								</li>
							</ul>
							<a href="#menu" class="uk-navbar-toggle uk-hidden@m" data-uk-toggle>
								<span data-uk-navbar-toggle-icon></span>
								<span class="uk-margin-small-left">{{ __('Меню') }}</span>
							</a>
						</div>

					</div>
				</div>
			</nav>
		</div>

		@yield('content')

		<div id="menu" data-uk-offcanvas="flip: true; overlay: true">
			<div class="uk-offcanvas-bar">
				<a href="{{ route('home') }}" class="uk-logo">{{ config('app.name') }}</a>
				<button class="uk-offcanvas-close" type="button" data-uk-close></button>

				<ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-top">
					<li><a href="{{ url('/about') }}">{{ __('Обо мне') }}</a></li>
					<li><a href="javascript:void(0);">{{ __('Рубрики') }}</a></li>
					<li><a href="{{ url('/contact') }}">{{ __('Контакты') }}</a></li>
					<li>
						<div class="uk-navbar-item">
							<a href="#" class="uk-button uk-button-success">{{ __('Подписаться') }}</a>
						</div>
					</li>
				</ul>

				<div class="uk-margin-top uk-text-center">
					<div data-uk-grid class="uk-child-width-auto uk-grid-small uk-flex-center">
						<div>
							<a href="#" data-uk-icon="icon: twitter" class="uk-icon-link"></a>
						</div>
						<div>
							<a href="#" data-uk-icon="icon: facebook" class="uk-icon-link"></a>
						</div>
						<div>
							<a href="#" data-uk-icon="icon: instagram" class="uk-icon-link"></a>
						</div>
						<div>
							<a href="#" data-uk-icon="icon: vimeo" class="uk-icon-link"></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer class="uk-section uk-text-center uk-text-muted">
			<div class="uk-container uk-container-small">

				<div>
					<ul class="uk-subnav uk-flex-center">
						<li><a href="#">{{ __('Политика конфиденциальности') }}</a></li>
						<li><a href="#">{{ __('Пользовательское соглашение') }}</a></li>
					</ul>
				</div>

				<div class="uk-margin-medium">
					<div data-uk-grid class="uk-child-width-auto uk-grid-small uk-flex-center">
						<div class="uk-first-column">
							<a href="#" data-uk-icon="icon: twitter" class="uk-icon-link uk-icon"></a>
						</div>
						<div>
							<a href="#" data-uk-icon="icon: facebook" class="uk-icon-link uk-icon"></a>
						</div>
						<div>
							<a href="#" data-uk-icon="icon: instagram" class="uk-icon-link uk-icon"></a>
						</div>
						<div>
							<a href="#" data-uk-icon="icon: vimeo" class="uk-icon-link uk-icon"></a>
						</div>
					</div>
				</div>

				<div class="uk-margin-medium uk-text-small copyright link-secondary">
					{!! __('© Copyright <a href="' . route('home') . '">' . '«' . config('app.name') . '»' . '</a> | Все права защищены') !!}
				</div>

			</div>
		</footer>
		
	</body>
</html>