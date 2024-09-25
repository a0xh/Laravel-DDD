@extends('admin.layouts.main')

@section('title', trans('Пользователи'))

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endpush

@section('content')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">

<div class="row align-items-center">
    <div class="border-0 mb-4">
        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">

            <h3 class="fw-bold mb-0">@yield('title')</h3>

                <div class="col-auto d-flex w-sm-100">
@if (Route::has('admin.users.create'))
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-set-task w-sm-100">
        <i class="icofont-plus-circle me-2 fs-6"></i>
        {{ __('Добавить') }}
    </a>
@endif
                </div>

        </div>
    </div>
</div>

@if (Session::has('success'))
    <div role="alert" class="alert alert-success">
        {{ __(Session::get('success')) }}
    </div>
@endif

            @isset ($users)
                <div class="row clearfix g-3">
                    <div class="col-sm-12">

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="table-responsive">

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">{{ __('Имя и фамилия') }}</th>
            <th scope="col">{{ __('Эл. почта') }}</th>
            <th scope="col">{{ __('Роль') }}</th>
            <th scope="col">{{ __('Статус') }}</th>
            <th scope="col">{{ __('IP-адрес') }}</th>
            <th scope="col">{{ __('Действия') }}</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td scope="row">
                    @empty (!$user->getAvatar())
                        <img src="{{ Storage::url($user->getAvatar()) }}" class="avatar rounded-circle">
                    @else
                        <img src="{{ asset('assets/img/avatar.png') }}" class="avatar rounded-circle">
                    @endempty

                    <span class="fw-bold ms-1">
                        {{ $user->getFirstName() }} {{ $user->getLastName() }}
                    </span>
                </td>

                <td>
                    <a href="mailto:{{ $user->getEmail() }}" class="btn-link">
                        {{ $user->getEmail() }}
                    </a>
                </td>

                <td>
                    @empty (!$user->getRoles())
                        @foreach ($user->getRoles() as $role)
                            {{ $role->getName() }}
                        @endforeach
                    @endempty
                </td>

                <td>
                        @if ($user->getStatus())
                            <span class="badge bg-success">
                                {{ __('Активный') }}
                            </span>
                        @else
                            <span class="badge bg-danger">
                                {{ __('Заблокированный') }}
                            </span>
                        @endif
                </td>

                <td>{!! '<span class="badge bg-warning">✖</span>' !!}</td>

                <td>
                    <div class="btn-group" role="group" aria-label="btn-group">
                        @if (Route::has('admin.user.show'))
                            <a href="{{ route('admin.users.show', $user->getUuid()) }}" class="btn btn-outline-secondary" title="{{ __('Посмотреть') }}">
                                <i class="icofont-eye-open text-info"></i>
                            </a>
                        @endif

                        @if (Route::has('admin.users.edit'))
                            <a href="{{ route('admin.users.edit', $user->getUuid()) }}" class="btn btn-outline-secondary" title="{{ __('Отредактировать') }}">
                                <i class="icofont-edit text-success"></i>
                            </a>
                        @endif

                        @if (Route::has('admin.users.delete'))
                            <form onsubmit="if (confirm('{{ __('Вы действительно хотите удалить данную запись из таблицы?') }}')) {return true} else {return false}" action="{{ route('admin.users.delete', $user->getUuid()) }}" method="post">

                                <input type="hidden" name="id" value="{{ $user->getUuid() }}">

                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-outline-secondary" title="{{ __('Удалить') }}">
                                    <i class="icofont-ui-delete text-danger"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


                                </div>
                            </div>
                        </div>

                        {{-- {{ $users->links('components.pagination') }} --}}

                    </div>
                </div>
            @else
<div class="card mb-3">
    <div class="card-body text-center p-5">
        @if (File::exists('assets/img/no-data.png'))
            <img src="{{ asset('assets/img/no-data.png') }}" class="img-fluid mx-size">
        @endif

        <div class="mt-4 mb-2">
            <span class="text-muted text-uppercase">
                {{ __('Тут пока нет данных для отображения!') }}
            </span>
        </div>

@if (Route::has('admin.user.create'))
                            <a href="{{ route('admin.user.create') }}" class="btn btn-primary border lift mt-1">
                                {{ __('Добавьте пользователя') }}
                            </a>
                        @endif
    </div>
</div>
            @endisset
            
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
@endpush