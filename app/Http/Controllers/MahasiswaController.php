<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    protected $validation_rules = [
        'email' => 'required|email',
        'nim' => 'required',
        'nama' => 'required',
        'angkatan' => 'required',
    ];

    public function __construct()
    {
        $this->middleware(['permission:manage_students']);
    }

    public function index()
    {
        $mahasiswas = Mahasiswa::paginate(25);
        return view('backend.mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('backend.mahasiswa.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->validation_rules);

        $user = User::create([
            'username' => request('nim'),
            'email' => request('email'),
            'password' => bcrypt('nim'),
            'status' => 1,
            'type' => User::MAHASISWA
        ]);

        $user->mahasiswa()->create($request->only(
            'nim',
            'nama',
            'angkatan',
            'tanggal_lahir',
            'tempat_lahir',
            'nohp'));

        session()->flash('flash_success', 'Berhasil menambah data mahasiswa atas nama '. $request->input('nama'));
        return redirect()->route('admin.mahasiswa.show', [$user->id]);
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('backend.mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('backend.mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $this->validate($request, $this->validation_rules);

        $mahasiswa->update($request->only(
            'nim',
            'nama',
            'angkatan',
            'tanggal_lahir',
            'tempat_lahir',
            'nohp'));

        $mahasiswa->user->update([
            'password' => bcrypt('secret'),
            'email' => request('email'),
            'status' => 1,
        ]);

        session()->flash('flash_success', 'Berhasil mengupdate data mahasiswa '.$mahasiswa->nama);
        return redirect()->route('admin.mahasiswa.show', [$mahasiswa->id]);
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $user = User::find($mahasiswa->id);
        $mahasiswa->delete();
        optional($user)->delete();

        session()->flash('flash_success', 'Berhasil menghapus data mahasiswa '.$mahasiswa->nama);
        return redirect()->route('admin.mahasiswa.index');
    }
}
