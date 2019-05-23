<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Publikasi;
use App\PublikasiDosen;
use App\Dosen;
class AnggotaController extends Controller
{
    public function index($id)
    {
        $publikasis=DB::table('publikasi')
                    ->join('publikasi_dosen','publikasi.id','=','publikasi_dosen.publikasi_id')
                    ->join('dosen','publikasi_dosen.dosen_id','=','dosen.id')
                    ->select('dosen.nama','dosen.nip','publikasi_dosen.posisi', 'publikasi_dosen.id')
                    ->where('publikasi.id','=',$id)
                    ->paginate(25);
        
        return view('backend.anggotapublikasi.index', compact('publikasis', 'id'));
    }
    public function create($id)
    {
        $dosens = Dosen::all()->pluck('nama', 'id');
        return view('backend.anggotapublikasi.create', compact('dosens', 'id'));
    }
    public function store(Request $request)
    {
    	$request -> validate([
            'dosen_id' => 'required' ,
            'publikasi_id' => 'required' ,
    		'posisi' => 'required'
    	]);

    	$publikasidosen = new PublikasiDosen();
        $publikasidosen->dosen_id = $request->input('dosen_id'); 
        $publikasidosen->publikasi_id = $request->input('publikasi_id'); 
    	$publikasidosen->posisi = $request->input('posisi');
    	//simpan file
    	$publikasidosen->save();

    	return redirect()->route('admin.anggotapublikasi.index', [$publikasidosen->publikasi_id]);
    }
    public function destroy($id)
    {
        $id = PublikasiDosen::findOrFail($id);
        $id = $id->publikasi_id;
        PublikasiDosen::destroy($id);
    	return redirect()->route('admin.anggotapublikasi.index', [$id]);
    }
}
