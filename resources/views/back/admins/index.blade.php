@extends('back.master')
@section('title', __('lang.admins'))
@section('admins_active', 'active bg-light')
{{-- @includeIf("$directory.pushStyles") --}}

@section('content')
    <!-- page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="h5 page-title">{{ __('lang.admins') }}</h2>

                <div class="page-title-right">
                    {{-- @if (permission(['add_admins'])) --}}
                    <a href="{{ route('back.admins.create') }}" class="btn btn-primary">
                        {{ __('lang.add_new') }}
                    </a>
                    {{-- @endif --}}
                </div>

            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="mt-3 card" id="mainCont">
        <div class="card-body">

            {{-- Table --}}
            <div class="table-responsive">
                <table class="table align-middle table-nowrap font-size-14">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-primary" width="5%">#</th>
                            <th class="text-primary">{{ __('lang.name') }}</th>
                            <th class="text-primary">{{ __('lang.email') }}</th>
                            <th class="text-primary">{{ __('lang.role') }}</th>
                            <th class="text-primary" width="11%">{{ __('lang.actions') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (count($data['data']) > 0)
                            @foreach ($data['data'] as $key => $item)
                                <tr>
                                    <td>{{ $data['data']->firstItem() + $loop->index }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if (count($item->getRoleNames()) > 0)
                                            <span class="p-2 text-white badge bg-warning">
                                                {{ $item->getRoleNames()[0] ?? '' }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ __('lang.actions') }} <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu">



                                                <a href="{{ route('back.admins.show', ['admin' => $item]) }}"
                                                    class="dropdown-item">
                                                    <span class="bx bx-show-alt"></span>
                                                    {{ __('lang.show') }}
                                                </a>

                                                {{-- @if (permission(['edit_admins'])) --}}

                                                <a href="{{ route('back.admins.edit', ['admin' => $item]) }}"
                                                    class="dropdown-item">
                                                    <span class="bx bx-edit-alt"></span>
                                                    {{ __('lang.edit') }}
                                                </a>
                                                {{-- @endif --}}

                                                {{-- @if (permission(['delete_admins'])) --}}



                                                <form action="{{ route('back.admins.destroy', ['admin' => $item]) }}"
                                                    method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item"
                                                        onclick="return confirm('{{ __('lang.delete_role') }} ?')">
                                                        <span class="bx bx-trash-alt"></span>
                                                        {{ __('lang.delete') }}
                                                    </button>
                                                </form>
                                                {{-- @endif --}}

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <x-empty-alert></x-empty-alert>
                        @endif
                    </tbody>
                </table>
            </div>

            {{ $data['data']->appends(request()->query())->render('pagination::bootstrap-4') }}

        </div>
    </div>
@endsection

@includeIf("$directory.scripts")
@includeIf("$directory.pushScripts")
