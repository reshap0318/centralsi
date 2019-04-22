<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaCariController extends Controller
{
    public function show(Request $request)
    {
        $this->validate($request, ['keyword' => 'required']);

        $keyword = $request->input('keyword');
        $filter = '%'.$keyword.'%';

        $mahasiswas = Mahasiswa::where('nama', 'like', $filter)
            ->orWhere('nim', 'like', $filter)
            ->paginate(25);

        return view('backend.mahasiswa.index', compact('mahasiswas', 'keyword'));

    }
}
