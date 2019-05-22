@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'publikasi' => route('admin.publikasi.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn_delete(route('admin.publikasi.destroy', [$publikasi->id]), $publikasi->id, 'icon-trash', 'Hapus publikasi', 'Anda yakin akan menghapus publikasi ini?') !!}
    {!! cui_toolbar_btn(route('admin.publikasi.index'), 'icon-list', 'List publikasi') !!}
    {!! cui_toolbar_btn(route('admin.publikasi.create'), 'icon-plus', 'Tambah publikasi') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    publikasii
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    {{ Form::model($publikasi, []) }}

                    <div class="form-group">
                        <label for="judul"><strong>judul</strong></label>
                        {{ Form::text('judul', null, ['class' => 'form-control-plaintext', 'id' => 'judul', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="tahun"><strong>tahun</strong></label>
                        {{ Form::text('tahun', null, ['class' => 'form-control-plaintext', 'id' => 'tahun', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="nama_publikasi"><strong>nama_publikasi</strong></label>
                        {{ Form::text('nama_publikasi', null, ['class' => 'form-control-plaintext', 'id' => 'nama_publikasi', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="jenis_publikasi"><strong>jenis_publikasi</strong></label>
                        {{ Form::text('jenis_publikasi', null, ['class' => 'form-control-plaintext', 'id' => 'jenis_publikasi', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="publisher"><strong>publisher</strong></label>
                        {{ Form::text('publisher', null, ['class' => 'form-control-plaintext', 'id' => 'publisher', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="total_dana"><strong>total_dana</strong></label>
                        {{ Form::text( 'total_dana', null, ['class' => 'form-control-plaintext', 'id' => 'total_dana', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="url"><strong>url</strong></label>
                        {{ Form::text('url', null, ['class' => 'form-control-plaintext', 'id' => 'url', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="file_artikel"><strong>file_artikel</strong></label>
                        {{ Form::text('file_artikel', null, ['class' => 'form-control-plaintext', 'id' => 'file_artikel', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="created_at"><strong>created_at</strong></label>
                        {{ Form::text('created_at', null, ['class' => 'form-control-plaintext', 'id' => 'created_at', 'readonly' => 'readonly']) }}
                    </div>

                    <div class="form-group">
                        <label for="update_at"><strong>update_at</strong></label>
                        {{ Form::text('update_at', null, ['class' => 'form-control-plaintext', 'id' => 'update_at', 'readonly' => 'readonly']) }}
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