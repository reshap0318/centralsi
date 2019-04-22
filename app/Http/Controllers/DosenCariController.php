<?php

namespace App\Http\Controllers;

use App\Dosen;
use Illuminate\Http\Request;

class DosenCariController extends Controller
{
    public function show(Request $request)
    {
        $this->validate($request, ['keyword' => 'required']);

        $keyword = $request->input('keyword');
        $filter = '%'.$keyword.'%';

        $dosens = Dosen::where('nama', 'like', $filter)
            ->orWhere('nip', 'like', $filter)
            ->paginate(25);

        return view('backend.dosen.index', compact('dosens', 'keyword'));

    }
}
