@extends('admin.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    <table class="table">
                    	<thead>
						    <tr>
						    	<th scope="col">Avatar</th>
						    	<th scope="col">Name</th>
						    	<th scope="col">E-mail</th>
						    	<th scope="col">Role</th>
						    	<th scope="col">Status</th>
						    	<th scope="col">Actions</th>
						    </tr>
						</thead>

						<tbody>
							@foreach ($users as $user)
								<tr>
									<td><img src="{{ asset($user->avatar) }}" class="avatar"></td>

									<td>{{ $user->first_name }} {{ $user->last_name }}</td>

									<td>{{ $user->email }}</td>

									@foreach ($user->roles as $role)
										<td>{{ $role->name }}</td>
									@endforeach

									<td>
										@if ($user->status)
											<span class="badge bg-warning text-dark">Inactive</span>
										@else
											<span class="badge bg-dark">Active</span>
										@endif
									</td>

									<td>
					                    <div class="btn-group" role="group" aria-label="btn-group">
					                        <div>
					                        	<a href="#" class="btn btn-outline-primary btn-sm">Show</a>
					                        </div>

					                        <div>
					                        	<a href="#" class="btn btn-outline-success btn-sm">Edit</a>
					                        </div>

					                        <div>
					                        	<form action="#" method="post">
						                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
						                        </form>
						                    </div>
					                    </div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
