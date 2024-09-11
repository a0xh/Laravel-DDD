@extends('user.layouts.main')

@section('content')
<div class="uk-section">
	<div class="uk-container uk-container-xsmall">
		<article class="uk-article">

			<h1 class="uk-article-title">Паттерн Decorator в связке с паттерном Repository с примерами на Laravel</h1>

			<div class="uk-article-meta uk-margin-top uk-margin-medium-bottom uk-flex uk-flex-middle">
				<img class="uk-border-circle avatar" src="img/avatar-tom.png" alt="Tom Farrell">
				
				<div>Владислав Маликов<br>
					<time datetime="2017-05-25T00:00:00+00:00">10/09/2024</time>
				</div>
			</div>

			<div class="article-content link-primary">
				<p>Musce libero nunc, dignissim quis turpis quis, semper vehicula dolor. Suspendisse tincidunt consequat quam, ac posuere leo dapibus id. Cras fringilla convallis elit, at eleifend mi interam.</p>

				<div class="share uk-text-center uk-margin-medium-top">
					<a class="uk-link-muted" href="#">
						<span data-uk-icon="icon: twitter; ratio: 1.2"></span>
					</a>

					<a class="uk-link-muted uk-margin-small-left" href="#">
						<span data-uk-icon="icon: facebook; ratio: 1.2"></span>
					</a>
				</div>
			</div>

			<hr class="uk-margin-medium">

			<div class="uk-margin-large-top paginate-post">
				<div class="uk-child-width-expand@s uk-grid-large" data-uk-grid>

					<div class="uk-first-column">
						<h4>How to setup naked domain SSL with Github pages</h4>

						<div class="uk-visible@s uk-text-muted uk-text-small">
							<p>Libero nunc, gignissim quis turpis quis, semper vehicula dolor. Suspendisse ti...</p>
						</div>

						<div><a class="remove-underline hvr-back" href="#">← Previous</a></div>
					</div>

					<div>
						<h4>Setting up new domain and DNS records</h4>

						<div class="uk-visible@s uk-text-muted uk-text-small">
							<p>Musce libero nunc, dignissim quis turpis quis, semper vehicula dolor. Suspendisse ti...</p>
						</div>

						<div class="uk-text-right">
							<a class="remove-underline hvr-forward" href="#">Next →</a>
						</div>
					</div>

				</div>
			</div>

		</article>
	</div>
</div>
@endsection