@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Publikasi' => route('admin.publikasi.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.anggotapublikasi.create', [$id]), 'icon-plus', 'Tambah Anggota') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>Anggota Publikasi</strong>
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
                            <th class="text-center">Nama</th>
                            <th class="text-center">NIP</th>
                            <th class="text-center">Posisi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($publikasis as $publikasi)
                            <tr>
                                <td class="text-center">{{ $publikasi->nama }}</td>
                                <td class="text-center">{{ $publikasi->nip }}</td>
                                <td class="text-center">{{ $publikasi->posisi }}</td>
                                <td class="text-center">
                                    {!! cui_btn_delete(route('admin.anggotapublikasi.destroy', [$publikasi->id]), "Anda yakin akan menghapus data publikasi ini?") !!}

                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">
                              Anggota publikasi
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
