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
							<img class="uk-border-circle avatar" src="{{ asset('img/avatar.png') }}" alt="Alex Koch" height="50">
						</div>

						<div class="uk-width-expand">
							<h2 class="uk-card-title uk-margin-remove-bottom">
								{{ __('Наполнение БД фейковыми данными на Laravel с помощью Faker\Generator()') }}
							</h2>
						</div>

					</div>
				</div>

				<div class="uk-card-body">
					<p>{{ __('Практические примеры использования фабрик и сидов с использованием класса Faker\Generator() на PHP-фреймворке Laravel v.11 для наполнения базы данных фейковыми данными.') }}</p>
				</div>

				<div class="uk-card-footer">
					<span class="uk-button uk-button-text">{{ __('Читать полностью →') }}</span>
				</div>
			</div>

			<div class="uk-card uk-card-default uk-box-shadow-small uk-box-shadow-hover-medium card-post uk-inline border-radius-medium border-xlight uk-width-1-1 uk-margin">

				<a href="#" class="uk-position-cover"></a>

				<div class="uk-card-header">
					<div class="uk-grid-small uk-flex-middle" data-uk-grid>

						<div class="uk-width-auto uk-first-column">
							<img class="uk-border-circle avatar" src="{{ asset('img/avatar.png') }}" alt="Alex Koch" height="50">
						</div>

						<div class="uk-width-expand">
							<h2 class="uk-card-title uk-margin-remove-bottom">
								{{ __('Связка паттерна Repository с паттерном Decorator с примерами на Laravel v.11') }}
							</h2>
						</div>

					</div>
				</div>

				<div class="uk-card-body">
					<p>{{ __('Подробное руководство на тему того, как использовать паттерн Repository в связке с паттерном Decorator с практическими примерами на фреймворке Laravel 11 для начинающих разработчиков.') }}</p>
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