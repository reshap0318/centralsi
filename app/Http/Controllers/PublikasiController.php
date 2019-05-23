<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publikasi;
class PublikasiController extends Controller
{
    public function index()
    {
    	$publikasis = Publikasi::paginate(25);
        return view('backend.publikasi.index', compact('publikasis'));
    }

    public function create()
    {
    	return view('backend.publikasi.create');
    }

    public function store(Request $request)
    {
    	$request -> validate([
    		'judul' => 'required' ,
    		'tahun' => 'required|digits:4',
    		'nama_publikasi' => 'required',
    		'jenis_publikasi' => 'numeric',
    		'total_dana' => 'numeric',
    		'file_artikel' => 'file|mimes:pdf',
    		'publish' => 'file|mimes:pdf',
    		'url' => 'required'
    	]);

    	$publikasi = new Publikasi();
    	$publikasi->judul = $request->input('judul');
    	$publikasi->tahun = $request->input('tahun');   
    	$publikasi->nama_publikasi = $request->input('nama_publikasi');
    	$publikasi->jenis_publikasi = $request->input('jenis_publikasi');
    	$publikasi->total_dana = $request->input('total_dana');
    	$publikasi->url = $request->input('url');
    	//simpan file
    	if($request->file('file_artikel')->isValid())
    	{
    		$filename = uniqid('Artikel-');
    		$fileext = $request->file('file_artikel')->extension();
    		$filenameext = $filename.'.'.$fileext;

    		$filepath = $request->file_artikel->storeAs('publikasi_artikel', $filenameext);
    		$publikasi->file_artikel = $filepath;
    	}

    	if($request->file('publisher')->isValid())
    	{
    		$filename = uniqid('Publisher-');
    		$fileext = $request->file('publisher')->extension();
    		$filenameext = $filename.'.'.$fileext;

    		$filepath = $request->publisher->storeAs('publikasi_publisher', $filenameext);
    		$publikasi->publisher = $filepath;
    	}
    	$publikasi->save();

    	return redirect()->route('admin.publikasi.show', [$publikasi]);
    }
    public function edit(Publikasi $publikasi)
    {
		return view('backend.publikasi.edit', compact('publikasi'));
		}
		public function tambah($id)
		{

			dd($id);	
			  $Publikasi = Publikasi::findOrFail($id);
				$dosen = Dosen::pluck('nama', 'id');
				return view('backend.publikasi.tambah');
		}
		public function tambahanggota(Request $Request)
		{
			$this->validate($request, $this->anggota_validation_rules);
			$data = $request->all();
			Publikasi::create($data);
			session()->flash('flash_success', 'Berhasil menambahkan data anggota KP');
			return redirect()->route('admin.publikasi.showkelompok',$request->publikasi_id);
		}
}
