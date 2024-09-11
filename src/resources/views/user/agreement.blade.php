@extends('user.layouts.main')

@section('content')
	<div class="uk-section">
		<div class="uk-container container-xxsmall">
			<h1 class="uk-article-title">Changelog posts</h1>
			<div class="article-content"></div>

			<article class="uk-article uk-margin-medium-top">
				<hr class="uk-margin-medium-bottom">

				<div class="uk-position-relative">
					<h2>🚀 April Updates</h2>

					<div class="uk-position-center-left-out uk-position-large uk-visible@m uk-text-small uk-text-muted">
						<time datetime="2019-04-22T00:00:00+00:00">Apr 22, 2019</time>
					</div>

					<div class="uk-hidden@m uk-text-small uk-text-muted uk-margin-bottom">
						<time datetime="2019-04-22T00:00:00+00:00">Apr 22, 2019</time>
					</div>
				</div>

				<div class="article-content">
					<p>April comes with a whole bunch of updates across our stack, the main focus for this month in regards to what was released is around:</p>

					<p>Further improving system, and allowing you to compare your results against wide averages for deflection rates Improvements to our tool to give you and your team more control And various other new features, updates, and bug fixes along the way.</p>

					<p><span class="uk-label" style="background-color: #3778ff">Added</span></p>
					
					<ul>
						<li>Some scheduled changelogs, tweets, and slack messages queued up this weekend and were not published on time. We fixed the issue and all delayed publications should be out.</li>

						<li>We now prioritize keywords over title and body so customers can more effectively influence search results</li>

						<li>Support form in the Assistant is now protected with reCaptcha to reduce spam reinitializeOnUrlChange added to the JavaScript API to improve support for pages with turbolinks</li>
					</ul>

					<p><span class="uk-label" style="background-color: #ff4772">Fixed</span></p>

					<ul>
						<li>Fixed an issue with the sync autolinker only interlinking selectively.</li>
						<li>Fixed up an issue with prematurely logging out users</li>
					</ul>
				</div>
			</article>

		</div>
	</div>
@endsection