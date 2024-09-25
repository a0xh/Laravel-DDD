@extends('admin.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        @if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Update') }}</div>

                <div class="card-body">
                    <form action="#" method="POST">

                    	@method('PUT')
                    	@csrf

                    	<div class="mb-3">
						    <label for="avatar" class="form-label">Avatar</label>
						    <input id="avatar" type="file" name="avatar" value="{{ $user->avatar ?? null }}" aria-describedby="avatar" disabled>
						</div>

						<div class="mb-3">
						    <label for="first_name" class="form-label">First Name</label>
						    <input id="first_name" type="text" name="first_name" value="{{ $user->first_name ?? null }}" class="form-control" aria-describedby="first_name" disabled>
						</div>

						<div class="mb-3">
						    <label for="last_name" class="form-label">Last Name</label>
						    <input id="last_name" type="text" name="last_name" value="{{ $user->last_name ?? null }}" class="form-control" aria-describedby="last_name" disabled>
						</div>

						<div class="mb-3">
						    <label for="email" class="form-label">E-mail</label>
						    <input id="email" type="email" name="email" value="{{ $user->email ?? null }}" class="form-control" aria-describedby="email" disabled>
						</div>

						<div class="mb-3">
							<div class="form-check">
								<input id="status" type="radio" name="status" value="active" class="form-check-input" disabled @checked($user->status === true)>
								<label for="status" class="form-check-label">Active</label>
							</div>

							<div class="form-check">
								<input id="status" type="radio" name="status" value="inactive" class="form-check-input" disabled @checked($user->status === false)>
								<label for="status" class="form-check-label">Inactive</label>
							</div>
						</div>

					</form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
