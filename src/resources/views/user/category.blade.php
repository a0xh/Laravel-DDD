@extends('user.layouts.main')

@section('content')
	<div class="uk-section">
		<div class="uk-container uk-container-xsmall">

			<h1 class="uk-article-title uk-text-center">{{ __('Блог back-end (PHP) разработчика') }}</h1>

			<div class="uk-card uk-card-default uk-box-shadow-small uk-box-shadow-hover-medium card-post uk-inline border-radius-medium border-xlight uk-width-1-1 uk-margin">

				<a href="#" class="uk-position-cover"></a>

				<div class="uk-card-header">
					<div class="uk-grid-small uk-flex-middle" data-uk-grid>

						<div class="uk-width-auto uk-first-column">
							<img class="uk-border-circle avatar" src="img/avatar-alex.png" alt="Alex Koch">
						</div>

						<div class="uk-width-expand">
							<h2 class="uk-card-title uk-margin-remove-bottom">
								{{ __('Связка паттерна Repository с паттерном Decorator с примерами на Laravel') }}
							</h2>

							<p class="uk-text-meta uk-margin-remove-top">
								<time datetime="2017-05-25T00:00:00+00:00">{{ __('10/09/2024') }}</time>
							</p>
						</div>

					</div>
				</div>

				<div class="uk-card-body">
					<p>{{ __('Musce libero nunc, dignissim quis turpis quis, semper vehicula dolor. Suspendisse tincidunt consequat quam, ac posuere leo dapibus id. Cras fringilla convallis elit, at eleifend mi interam.') }}</p>
				</div>

				<div class="uk-card-footer">
					<span class="uk-button uk-button-text">{{ __('Читать полностью →') }}</span>
				</div>
			</div>

			<ul class="uk-pagination uk-margin-medium-top">
				<li>
					<a href="#" class="hvr-back">{{ __('← Туда') }}</a>
				</li>
				<li class="uk-margin-auto-left">
					<a href="#" class="hvr-forward">{{ __('Сюда →') }}</a>
				</li>
			</ul>

		</div>
	</div>
@endsection