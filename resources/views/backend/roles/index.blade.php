@inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Roles' => route('admin.roles.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.roles.create'), 'icon-plus', 'Tambah') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-header">
                    <strong>List Roles</strong>
                </div><!--card-header-->

                <div class="card-body">

                    <table class="table table-striped {{ count($roles) > 0 ? 'datatable' : '' }} dt-select">
                        <thead>
                        <tr>
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                            <th>@lang('global.roles.fields.name')</th>
                            <th>@lang('global.roles.fields.permission')</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if (count($roles) > 0)
                            @foreach ($roles as $role)
                                <tr data-entry-id="{{ $role->id }}">
                                    <td></td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions()->pluck('name') as $permission)
                                            <span class="badge badge-success">{{ $permission }}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        {!! cui_btn_edit(route('admin.roles.edit',[$role->id])) !!}
                                        {!! cui_btn_delete(route('admin.roles.destroy', [$role->id]), 'Anda yakin menghapus role ini?')!!}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">@lang('global.app_no_entries_in_table')</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.roles.mass_destroy') }}';
    </script>
@endsection