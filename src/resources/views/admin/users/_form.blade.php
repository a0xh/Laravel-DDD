<div class="row clearfix g-3">
    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-3 align-items-center">

                    {{-- ================ Start First Name User ================ --}}
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">{{ _('Имя') }}</label>

                        <input id="first_name" type="text" name="first_name" value="{{ old('first_name', $user['first_name'] ?? null) }}" class="form-control @error('first_name') is-invalid @enderror" autocomplete="first_name" autofocus>

                        @error('first_name')
                        	<span role="alert" class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- ================ End First Name User ================ --}}

                    {{-- ================ Start Last Name User ================ --}}
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">{{ _('Фамилия') }}</label>

                        <input id="last_name" type="text" name="last_name" value="{{ old('last_name', $user['last_name'] ?? null) }}" class="form-control @error('last_name') is-invalid @enderror" autocomplete="last_name">

                        @error('first_name')
                        	<span role="alert" class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- ================ End Last Name User ================ --}}

                    {{-- ================ Start E-mail User ================ --}}
                    <div class="col-md-12">
                        <label for="email" class="form-label">{{ _('Эл. почта') }}</label>

                        <input id="email" type="email" name="email" value="{{ old('email', $user['email'] ?? null) }}" class="form-control @error('email') is-invalid @enderror" autocomplete="email">

                        @error('first_name')
                        	<span role="alert" class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- ================ End E-mail User ================ --}}

                    {{-- ================ Start Password User ================ --}}
                    <div class="col-md-12">
                        <label for="password" class="form-label">{{ _('Пароль') }}</label>

                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">

                        @error('first_name')
                        	<span role="alert" class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- ================ End Password User ================ --}}

                    {{-- ================ Start Password Confirm User ================ --}}
                    <div class="col-md-12">
                        <label for="password-confirm" class="form-label">{{ _('Подтверждение пароля') }}</label>

                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
                    </div>
                    {{-- ================ End Password Confirm User ================ --}}
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="sticky-lg-top">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3 align-items-center">

                        {{-- ================ Start Avatar User ================ --}}
                        <div class="col-md-12">
                            <label for="media" class="form-label">{{ _('Аватар') }}</label>

                            @isset ($user['avatar'])
                                <input id="media" type="file" name="media" class="dropify" data-default-file="{{ Storage::url(old('avatar', $user['avatar'] ?? null)) }}" data-allowed-file-extensions="jpg jpeg png svg gif">
                            @else
                                <input type="file" id="media" name="media" class="dropify" data-allowed-file-extensions="jpg jpeg png svg gif">
                            @endisset
                        </div>
                        {{-- ================ Start Avatar User ================ --}}

                        {{-- ================ Start Role User ================ --}}
                        <div class="col-md-12">
                            <label for="role_id" class="form-label">{{ _('Роль') }}</label>

                            <select id="role_id" name="role_id" class="form-select @error('role_id') is-invalid @enderror">
                                <option selected disabled hidden>{{ _('-- Выбрать роль --') }}</option>
                                @isset ($roles)
                                    @foreach ($roles as $role)
                                        @isset ($user)
                                            @foreach($user['roles'] as $value)
                                                <option value="{{ $role['id'] }}" @selected($role['id'] == $value['id'])>{{ $role['name'] }}</option>
                                            @endforeach
                                        @else
                                            <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                                        @endisset
                                    @endforeach
                                @endisset
                            </select>

	                        @error('first_name')
	                        	<span role="alert" class="invalid-feedback">{{ $message }}</span>
	                        @enderror
                        </div>
                        {{-- ================ End Role User ================ --}}

                        {{-- ================ Start Status User ================ --}}
                        <div class="col-md-12">
                            <label class="form-label">{{ _('Статус') }}</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input id="status" type="radio" name="status" value="1" class="form-check-input" @checked(old('status', $user['status'] ?? false) == true)>

                                        <label for="status" class="form-check-label">{{ _('Активный') }}</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input id="status" type="radio" name="status" value="0" class="form-check-input" @checked(old('status', $user['status'] ?? false) == false)>

                                        <label for="status" class="form-check-label">{{ _('Заблокированный') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ================ Start Status User ================ --}}

                    </div>

                    <button type="submit" class="btn btn-primary mt-4 text-uppercase px-5">{{ _('Сохранить') }}</button>

                </div>
            </div>
        </div>
    </div>
</div>