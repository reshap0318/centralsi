<?php

namespace App\Http\Controllers;

use App\Dosen;
use Illuminate\Http\Request;

class PembimbingSubmissionController extends Controller
{
    public function create()
    {
        $dosens = Dosen::all()->pluck('nama', 'id');
        $jabatans = config('central.jabatan_pembimbing');

        return view('backend.pembimbing.create', compact('dosens', 'jabatans'));
    }

    public function store(Request $request)
    {
    }
}
