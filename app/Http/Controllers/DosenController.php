<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\User;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public $validation_rules = [
        'email' => 'required|email',
        'nidn' => 'required',
        'nama' => 'required',
        'nik' => 'required',
    ];

    public function __construct()
    {
        $this->middleware(['permission:manage_lecturers']);
    }

    public function index()
    {
        $dosens = Dosen::paginate(25);
        return view('backend.dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('backend.dosen.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->validation_rules);

        $user = User::create([
            'username' => request('nip'),
            'email' => request('email'),
            'password' => bcrypt('nip'),
            'status' => 1,
            'type' => User::DOSEN
        ]);

        $user->dosen()->create($request->only(
            'nip',
            'nidn',
            'nik',
            'nama',
            'tanggal_lahir',
            'tempat_lahir',
            'nohp'));

        session()->flash('flash_success', 'Berhasil menambahkan data dosen atas nama '. $request->input('nama'));
        return redirect()->route('admin.dosen.show', [$user->id]);
    }

    public function show(Dosen $dosen)
    {
        return view('backend.dosen.show', compact('dosen'));
    }

    public function edit(Dosen $dosen)
    {
        return view('backend.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $this->validate($request, $this->validation_rules);

        $dosen->update($request->only(
            'nip',
            'nidn',
            'nik',
            'nama',
            'tanggal_lahir',
            'tempat_lahir',
            'nohp'));

        $dosen->user->update([
            'password' => bcrypt('secret'),
            'email' => request('email'),
            'status' => 1,
        ]);

        session()->flash('flash_success', 'Berhasil mengupdate data dosen '.$dosen->nama);
        return redirect()->route('admin.dosen.show', [$dosen->id]);
    }

    public function destroy(Dosen $dosen)
    {
        $user = User::find($dosen->id);
        $dosen->delete();
        optional($user)->delete();

        session()->flash('flash_success', "Berhasil menghapus dosen ".$dosen->nama);
        return redirect()->route('admin.dosen.index');
    }
}
