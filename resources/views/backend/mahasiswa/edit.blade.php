@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Mahasiswa' => route('admin.dosen.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.dosen.create'), 'icon-plus', 'Tambah Mahasiswa') !!}
    {!! cui_toolbar_btn(route('admin.dosen.index'), 'icon-list', 'List Mahasiswa') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{ Form::model($mahasiswa, ['route' => ['admin.mahasiswa.update', $mahasiswa->id], 'method' => 'patch']) }}

                {{--CARD HEADER --}}
                <div class="card-header">
                    Edit Mahasiswa
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backend.mahasiswa._form')
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
