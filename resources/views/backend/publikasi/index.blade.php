@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Publikasi' => route('admin.publikasi.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.publikasi.create'), 'icon-plus', 'Tambah Publikasi') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>Daftar Publikasi</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                           
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $publikasis->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Jumlah Anggota</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($publikasis as $publikasi)
                            <tr>
                                <td class="text-center">{{ $publikasi->tahun }}</td>
                                <td>{{ $publikasi->judul }}</td>
                                <td class="text-center">{{$publikasi->anggotas->count()}}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.publikasi.show', [$publikasi->id])) !!}
                                    {!! cui_btn_edit(route('admin.publikasi.edit', [$publikasi->id])) !!}
                                    {!! cui_btn_delete(route('admin.publikasi.destroy', [$publikasi->id]), "Anda yakin akan menghapus data publikasi ini?") !!}
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                Data publikasi belum ada
                            </td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $publikasis->links() }}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->

                {{-- CARD FOOTER--}}
                <div class="card-footer">
                </div>

            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
