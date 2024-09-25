@extends('admin.layouts.auth')

@section('title', 'Авторизация')

@section('content')
    <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
        <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">

            <form action="{{ route('login') }}" method="POST" class="row g-1 p-3 p-md-4">
                @csrf
                
                <div class="col-12 text-center mb-5">
                    <h1>@yield('title')</h1>
                    <span>{{ __('Только для администраторов!') }}</span>
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

                <div class="col-12">
                    <div class="mb-2">
                        <div class="form-label">
                            <span class="d-flex justify-content-between align-items-center">
                                {{ __('Пароль') }}
                                @if (Route::has('password.request'))
                                    <a class="text-secondary" href="{{ route('password.request') }}">
                                        {{ __('Забыли пароль?') }}
                                    </a>
                                @endif
                            </span>
                        </div>

                        <input id="password" type="password" name="password" placeholder="********" class="form-control form-control-lg @error('password') is-invalid @enderror" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input id="remember" type="checkbox" name="remember" class="form-check-input" checked>

                        <label class="form-check-label" for="remember">
                            {{ __('Запомнить меня') }}
                        </label>
                    </div>
                </div>

                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase">
                        {{ __('Отправить') }}
                    </button>
                </div>

                <div class="col-12 text-center mt-4">
                    @if (Route::has('register'))
                        <span>{!! __('Нет аккаунта? Перейти к <a href="' . route('register') . '" class="text-secondary">' . 'регистрации</a>.') !!}</span>
                    @endif
                </div>
            </form>

        </div>
    </div>
@endsection
