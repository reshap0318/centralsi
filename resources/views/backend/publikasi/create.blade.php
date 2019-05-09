@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Publikasi' => route('admin.publikasi.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.publikasi.index'), 'icon-list', 'Daftar Publikasi') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{ Form::open(['route' => 'admin.publikasi.store', 'method' => 'post', 'files' => 'true']) }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Tambah Publikasi
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.publikasi._form')
                </div>

                {{--CARD FOOTER--}}
                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-primary"/>
                </div>

                {{ Form::close() }}
            </div>

        </div>
    </div>
@endsection
