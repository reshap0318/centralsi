@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'User' => route('admin.users.index'),
        'Tambah' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.users.index'), 'icon-list', 'List User') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Tambah User</strong>
                </div><!--card-header-->

                {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store']]) !!}

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
                        {!! Form::label('password', 'Password*', ['class' => 'control-label']) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('password'))
                            <p class="help-block">
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>

                    <div class="col-xs-12 form-group">
                        {!! Form::label('roles', 'Roles*', ['class' => 'control-label']) !!}
                        {!! Form::select('roles[]', $roles, old('roles'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
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

