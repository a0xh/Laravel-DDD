@extends('admin.layouts.auth')

@section('title', 'Регистрация')

@section('content')
<div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
    <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">

        <form action="{{ route('register') }}" method="POST" class="row g-1 p-3 p-md-4">
            @csrf

            <div class="col-12 text-center mb-5">
                <h1>@yield('title')</h1>
                <span>{{ __('Доступ к панели появится только после одобрения!') }}</span>
            </div>

            <div class="col-6">
                <div class="mb-2">
                    <label for="first_name" class="form-label">{{ __('Полное имя') }}</label>

                    <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Иван" class="form-control form-control-lg @error('first_name') is-invalid @enderror" required autocomplete="first_name">

                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="mb-2">
                    <label for="last_name" class="form-label">&nbsp;</label>

                    <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Иванов" class="form-control form-control-lg @error('last_name') is-invalid @enderror" required autocomplete="last_name">

                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="mb-2">
                    <label for="email" class="form-label">{{ __('Эл. почта') }}</label>

                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="example@email.ru" class="form-control form-control-lg @error('email') is-invalid @enderror" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-2">
                    <label for="password" class="form-label">{{ __('Пароль') }}</label>

                    <input id="password" type="password" name="password" placeholder="********" class="form-control form-control-lg @error('password') is-invalid @enderror" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-2">
                    <label for="password-confirm" class="form-label">&nbsp;</label>
                    <input id="password-confirm" type="password" name="password_confirmation" placeholder="********" class="form-control form-control-lg" required autocomplete="new-password">
                </div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input id="agreement" type="checkbox" name="agreement" class="form-check-input" checked>

                    <label class="form-check-label" for="agreement">
                        {!! __('Я принимаю условия <a href="' . '#' . '" class="text-secondary">' . 'пользовательского соглашения</a>.') !!}
                    </label>
                </div>
            </div>
            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase">{{ __('Отправить') }}</button>
            </div>
            <div class="col-12 text-center mt-4">
                @if (Route::has('register'))
                    <span>{!! __('Уже есть аккаунт? Перейти к <a href="' . route('login') . '" class="text-secondary">' . 'авторизации</a>.') !!}</span>
                @endif
            </div>
        </form>
        
    </div>
</div>
@endsection
