@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'User' => route('admin.users.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.users.index'), 'icon-list', 'List User') !!}
    {!! cui_toolbar_btn(route('admin.users.create'), 'icon-plus', 'Tambah User') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Edit User</strong>
                </div><!--card-header-->

                {!! Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user->id]]) !!}

                <div class="card-body">
                    <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                    </div>

                    <div class="col-xs-12 form-group">
                        {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('email'))
                            <p class="help-block">
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>

                    <div class="col-xs-12 form-group">
                        {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('password'))
                            <p class="help-block">
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>

                    <div class="col-xs-12 form-group">
                        {!! Form::label('roles', 'Roles*', ['class' => 'control-label']) !!}
                        {!! Form::select('roles[]', $roles, old('roles') ? old('roles') : $user->roles()->pluck('name', 'name'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('roles'))
                            <p class="help-block">
                                {{ $errors->first('roles') }}
                            </p>
                        @endif
                    </div>

                </div><!--card-body-->

                <div class="card-footer">
                    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-square btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection


