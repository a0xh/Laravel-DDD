@extends('admin.layouts.main')

@section('title', trans('Добавление пользователя'))

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}" ansyc>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endpush

@section('content')
	<div class="body d-flex py-lg-3 py-md-2">
		<div class="container-xxl">

			<div class="row align-items-center">
				<div class="border-0 mb-4">
					<div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
						<h3 class="fw-bold mb-0">@yield('title')</h3>
					</div>
				</div>
			</div>

			@if ($errors->any())
				@foreach ($errors->all() as $error)
					<div role="alert" class="alert alert-danger">{{ $error }}</div>
				@endforeach
			@endif

			<form action="" method="post" enctype="multipart/form-data">
				@method('PUT')
				@csrf

				@includeIf('admin.users._form')
		    </form>

	    </div>
	</div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/dropify.bundle.js') }}" ansyc></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>

    <script>
        $(function() {
            $('.dropify').dropify();
        });
    </script>
@endpush