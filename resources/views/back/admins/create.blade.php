@extends('back.master')
@section('title', __('lang.create_admin'))
@section('roles_active', 'active bg-light')

@section('content')
    <!-- page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="h5 page-title">{{ __('lang.add_new_admin') }}</h2>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('back.admins.store') }}" method="post" id="add_form" enctype="multipart/form-data">
                @csrf

                <div id="add_form_messages"></div>

                {{-- MODIFICATIONS FROM HERE --}}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label">{{ __('lang.name') }}</label>
                        <input type="text" class="border form-control" name="name"
                            placeholder="{{ __('lang.please_enter') }} {{ __('lang.name') }}...">
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">{{ __('lang.email') }}</label>
                        <input type="email" class="border form-control" name="email"
                            placeholder="{{ __('lang.please_enter') }} {{ __('lang.email') }}...">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                    </div>

                    <div class="form-group col-md-12">
                        <label class="form-label">{{ __('lang.role') }}</label>
                        <select class="border form-control" name="role">
                            <option value="">{{ __('lang.select_role') }}</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-6">
                        <label class="form-label">{{ __('lang.password') }}</label>
                        <input type="password" class="border form-control" name="password"
                            placeholder="{{ __('lang.please_enter') }} {{ __('lang.password') }}...">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                    </div>

                    <div class="form-group col-6">
                        <label class="form-label">{{ __('lang.password_confirmation') }}</label>
                        <input type="password" class="border form-control" name="password_confirmation"
                            placeholder="{{ __('lang.please_enter') }} {{ __('lang.password_confirmation') }}...">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                    </div>
                </div>
                {{-- MODIFICATIONS TO HERE --}}

                <hr class="text-muted">

                <div class="form-group float-end">
                    <button type="submit" class="btn btn-primary">{{ __('lang.submit') }}</button>
                </div>
            </form>

        </div>
    </div>

@endsection
