@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'publikasi' => route('admin.publikasi.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.publikasi.create'), 'icon-plus', 'Tambah Publikasi') !!}
    {!! cui_toolbar_btn(route('admin.publikasi.index'), 'icon-list', 'Daftar Publikasi') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ Form::model($publikasi, ['route' => ['admin.publikasi.update', $publikasi->id], 'method' => 'patch']) }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    Edit Publikasi
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.publikasi._form')
                </div>

                {{-- CARD FOOTER--}}
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Simpan"/>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
