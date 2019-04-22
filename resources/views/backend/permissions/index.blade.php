@inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Permissions' => route('admin.permissions.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.permissions.create'), 'icon-plus', 'Tambah Permission') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-header">
                    <strong>List Permission</strong>
                </div><!--card-header-->

                <div class="card-body">
                    <table class="table table-striped {{ count($permissions) > 0 ? 'datatable' : '' }} dt-select">
                        <thead>
                        <tr>
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                            <th>@lang('global.permissions.fields.name')</th>
                            <th>&nbsp;</th>

                        </tr>
                        </thead>

                        <tbody>
                        @if (count($permissions) > 0)
                            @foreach ($permissions as $permission)
                                <tr data-entry-id="{{ $permission->id }}">
                                    <td></td>
                                    <td>{{ $permission->name }}</td>
                                    <td class="text-center">
                                        {!! cui_btn_edit(route('admin.permissions.edit',[$permission->id])) !!}
                                        {!! cui_btn_delete(route('admin.permissions.destroy', [$permission->id]), 'Anda yakin menghapus permissions ini?')!!}
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">@lang('global.app_no_entries_in_table')</td>
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
        window.route_mass_crud_entries_destroy = '{{ route('admin.permissions.mass_destroy') }}';
    </script>
@endsection