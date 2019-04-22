@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Mahasiswa' => route('admin.mahasiswa.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn_delete(route('admin.mahasiswa.destroy', [$mahasiswa->id]), $mahasiswa->id, 'icon-trash', 'Hapus Mahasiswa', 'Anda yakin akan menghapus.mahasiswa.ini?') !!}
    {!! cui_toolbar_btn(route('admin.mahasiswa.index'), 'icon-list', 'List Mahasiswa') !!}
    {!! cui_toolbar_btn(route('admin.mahasiswa.create'), 'icon-plus', 'Tambah Mahasiswa') !!}
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    Mahasiswa
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    {{ Form::model($mahasiswa, []) }}

                    <div class="form-group">
                        <label for="nama"><strong>Nama</strong></label>
                        {{ Form::text('nama', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nip"><strong>NIM</strong></label>
                        {{ Form::text('nim', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="angkatan"><strong>Angkatan</strong></label>
                        {{ Form::text('angkatan', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir"><strong>Tempat Lahir</strong></label>
                        {{ Form::text('tempat_lahir', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir"><strong>Tanggal Lahir</strong></label>
                        {{ Form::input('date', 'tanggal_lahir', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="email"><strong>Email</strong></label>
                        {{ Form::text('email', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nohp"><strong>No. HP</strong></label>
                        {{ Form::text('nohp', null, ['class' => 'form-control-plaintext', 'readonly' => 'readonly']) }}
                    </div>

                    {{ Form::close() }}

                </div>

                {{-- CARD FOOTER --}}
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>

@endsection