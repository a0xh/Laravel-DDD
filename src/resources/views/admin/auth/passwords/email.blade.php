@extends('admin.layouts.auth')

@section('title', 'Сброс пароля')

@section('content')
    <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
        <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">

            <form class="row g-1 p-3 p-md-4">
                <div class="col-12 text-center mb-5">
                    <h1>@yield('title')</h1>
                    <span>{{ __('Введите адрес электронной почты, который вы использовали при регистрации аккаунта.') }}</span>
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

                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase">
                        {{ __('Отправить') }}
                    </button>
                </div>
                
                <div class="col-12 text-center mt-4">
                    <span class="text-muted">
                        @if (Route::has('register'))
                            {!! __('<a href="' . route('login') . '" class="text-secondary">' . 'Вернуться к авторизации</a>') !!}</span>
                        @endif
                </div>
            </form>
            
        </div>
    </div>
@endsection

