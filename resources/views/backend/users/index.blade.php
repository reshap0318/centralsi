@inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'User' => route('admin.users.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.users.create'), 'icon-plus', 'Tambah User') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-header">
                    <strong>List Users</strong>
                </div><!--card-header-->

                <div class="card-body">
                    <table class="table table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select">
                        <thead>
                        <tr>
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                            <th>@lang('global.users.fields.name')</th>
                            <th>@lang('global.users.fields.email')</th>
                            <th>@lang('global.users.fields.roles')</th>
                            <th>&nbsp;</th>

                        </tr>
                        </thead>

                        <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                                <tr data-entry-id="{{ $user->id }}">
                                    <td></td>

                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles()->pluck('name') as $role)
                                            <span class="label label-info label-many">{{ $role }}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        {!! cui_btn_edit(route('admin.users.edit',[$user->id])) !!}
                                        {!! cui_btn_delete(route('admin.users.destroy', [$user->id]), 'Anda yakin menghapus user ini?')!!}
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection

@section('after-scripts')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    </script>
@endsection