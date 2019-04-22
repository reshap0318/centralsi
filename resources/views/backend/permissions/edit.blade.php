@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Permissions' => route('admin.permissions.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.permissions.index'), 'icon-list', 'List Permission') !!}
    {!! cui_toolbar_btn(route('admin.permissions.create'), 'icon-plus', 'Tambah Permission') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>@lang('strings.backend.dashboard.welcome') {{ auth()->user()->username }}!</strong>
                </div><!--card-header-->

                {!! Form::model($permission, ['method' => 'PUT', 'route' => ['admin.permissions.update', $permission->id]]) !!}
                <div class="card-body">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div><!--card-body-->

                <div class="card-footer">
                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-square btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection

