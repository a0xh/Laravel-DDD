<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title') | {{ config('app.name') }}</title>

    {{-- Favicons --}}
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" sizes="32x32" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon.png') }}" />

    @stack('styles')
</head>

<body>
    <div id="ebazar-layout" class="theme-blue">

        <div class="sidebar px-4 py-4 py-md-4 me-0">
            <div class="d-flex flex-column h-100">
                <a href="#" class="mb-0 brand-icon">
                    <span class="logo-icon">
                        <i class="icofont-skull-face fs-3"></i>
                    </span>
                    <span class="logo-text">{{ config('app.name') }}</span>
                </a>

                <ul class="menu-list flex-grow-1 mt-3">
                    <li>
                        <a href="#" class="m-link">
                            <i class="icofont-chart-bar-graph"></i>
                            <span>{{ __('Статистика') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}" class="m-link">
                            <i class="icofont-users-alt-2"></i>
                            <span>{{ __('Пользователи') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="m-link">
                            <i class="icofont-education"></i>
                            <span>{{ __('Страницы') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="m-link">
                            <i class="icofont-ui-email"></i>
                            <span>{{ __('Подписчики') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="m-link">
                            <i class="icofont-paper"></i>
                            <span>{{ __('Посты') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="m-link">
                            <i class="icofont-cube"></i>
                            <span>{{ __('Категории') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="m-link">
                            <i class="icofont-tags"></i>
                            <span>{{ __('Теги') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="m-link">
                            <i class="icofont-speech-comments"></i>
                            <span>{{ __('Комметарии') }}</span>
                        </a>
                    </li>

                    <li href="javascript:void(0);" class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#tools">
                            <i class="icofont-tools-alt-2"></i>
                            <span>Инструменты</span>
                            <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span>
                        </a>

                        <ul class="sub-menu collapse" id="tools">
                            @if (Route::has('admin.tools.robots.index'))
                                <li>
                                    <a href="{{ route('admin.tools.robots.index') }}" @class([
                                        'active ms-link' => Route::is('admin.tools.robots.index'),
                                        'ms-link' => !Route::is('admin.tools.robots.index')
                                    ])>
                                        <span>@lang('messages.admin.tools.robots.index')</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="m-link">
                            <i class="icofont-ui-settings"></i>
                            <span>{{ __('Настройки') }}</span>
                        </a>
                    </li>
                </ul>

                <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                    <span class="ms-2"><i class="icofont-bubble-right"></i></span>
                </button>
            </div>
        </div>

        <div class="main px-lg-4 px-md-4">
            <div class="header">
                <nav class="navbar py-4">
                    <div class="container-xxl">

                        <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                            <div class="d-flex">
                                <a href="#" target="_blank" rel="noreferrer" class="nav-link text-primary collapsed">
                                    {{ __('Перейти на сайт →') }}
                                </a>
                            </div>

                            <div class="dropdown zindex-popover">
                                <a href="javascript:void(0);" class="nav-link dropdown-toggle pulse" role="button" data-bs-toggle="dropdown">
                                    <img src="{{ asset(str()->of('assets/img/')->append(app()->getLocale())->finish('.png')) }}">
                                </a>
                                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-md-end p-0 m-0 mt-3">
                                    <div class="card border-0">
                                        <ul class="list-unstyled py-2 px-3">
                                            <li>
                                                <a href="{{ url('lang/en') }}"><img src="{{ asset('assets/img/en.png') }}"> {{ __('English') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('lang/ru') }}"><img src="{{ asset('assets/img/ru.png') }}"> {{ __('Русский') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown notifications">
                                <a href="javascript:void(0);" class="nav-link dropdown-toggle pulse" role="button" data-bs-toggle="dropdown">
                                    <i class="icofont-alarm fs-5"></i>
                                    <span class="pulse-ring"></span>
                                </a>

                                <div id="NotificationsDiv" class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-md-end p-0 m-0 mt-3">
                                    <div class="card border-0 w380">
                                        <div class="card-header border-0 p-3">
                                            <h5 class="mb-0 font-weight-light d-flex justify-content-between">
                                                <span>Уведомления</span>
                                                <span class="badge text-white">06</span>
                                            </h5>
                                        </div>

                                        <div class="tab-content card-body">
                                            <div class="tab-pane fade show active">
                                                <ul class="list-unstyled list mb-0">
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            
                                                            @if (File::exists('img/avatar.png'))
                                                                <img src="{{ asset('img/avatar.png') }}" class="avatar rounded-circle">
                                                            @else
                                                                <div class="avatar rounded-circle no-thumbnail">AH</div>
                                                            @endif

                                                            <div class="flex-fill ms-2">
                                                                <p class="d-flex justify-content-between mb-0">
                                                                    <span class="font-weight-bold">Chloe Walkerr</span>
                                                                    <small>2MIN</small>
                                                                </p>
                                                                <span>Added New Product 2021-07-15
                                                                    <span class="badge bg-success">Add</span>
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <a class="card-footer text-center border-top-0" href="#"> View all notifications</a>

                                    </div>
                                </div>
                            </div>

                            <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                                <div class="u-info me-2">
                                    <p class="mb-0 text-end line-height-sm">
                                        <span class="font-weight-bold">{{ $user->name ?? null }}</span>
                                    </p>

                                    <small>{{ __('Nobody') }}</small>
                                </div>
                                
                                <a href="javascript:void(0);" class="nav-link dropdown-toggle pulse p-0" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                                    <img src="{{ asset('img/avatar.png') }}" class="avatar lg rounded-circle img-thumbnail">
                                </a>

                                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                    <div class="card border-0 w280">

                                        <div class="card-body pb-0">
                                            <div class="d-flex py-1">
                                                <img class="avatar rounded-circle" src="{{ asset('img/avatar.png') }}">
                                                <div class="flex-fill ms-3">
                                                    <p class="mb-0">
                                                        <span class="font-weight-bold">
                                                            {{ $user->first_name ?? null }}
                                                            {{ $user->last_name ?? null }}
                                                        </span>
                                                    </p>
                                                    <small>{{ $user->email ?? null }}</small>
                                                </div>
                                            </div>
                                            
                                            <div><hr class="dropdown-divider border-dark"></div>
                                        </div>

                                        <div class="list-group m-2">
                                            @if (Route::has('admin.profile.index'))
                                                <a href="{{ route('admin.profile.index') }}" class="list-group-item list-group-item-action border-0">
                                                    <i class="icofont-ui-user fs-5 me-3"></i>
                                                    Профиль
                                                </a>
                                            @endif

                                            <a href="#" class="list-group-item list-group-item-action border-0">
                                                <i class="icofont-ui-settings fs-5 me-3"></i>
                                                Настройки
                                            </a>

                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action border-0">
                                                <i class="icofont-logout fs-5 me-3"></i>
                                                {{ __('Выход') }}
                                            </a>
                                            
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                            <span class="fa fa-bars"></span>
                        </button>

<div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
    <div class="input-group flex-nowrap input-group-lg">
        <input type="search" class="form-control" placeholder="Поиск..." aria-label="search" aria-describedby="addon-wrapping">
        
        <button type="button" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button>
    </div>
</div>

                    </div>
                </nav>
            </div>
            
            @yield('content')

        </div>

    </div>

    @stack('scripts')
</body>
</html>