<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\kontak;
use App\Models\jenis_kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KontakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['show', 'index']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = siswa::paginate(5);
        $jk = jenis_kontak::all();
        return view('admin-pages.master-kontak', compact('siswa', 'jk'), [
            'title' => 'Master Kontak'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $siswa=siswa::find($id);
        $jk = jenis_kontak::all();
        return view('admin-pages.crud-kontak.tambahKontak', compact('siswa', 'jk'), [
            'title' => 'Tambah Kontak'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required' => 'form ini harus diisi!!',
            'min' => ':attribute minimal :min karakter!!',
        ];

        $this->validate($request, [
            'deskripsi' => 'required|min:3'
        ], $message);

        kontak::create([
            'siswa_id' => $request -> siswa_id,
            'jenis_kontak_id' => $request -> jenis_kontak_id,
            'deskripsi' => $request -> deskripsi
        ]);

        Session::flash('message', 'Kontak Berhasil ditambahkan..');
        return redirect('/master-kontak');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kons=siswa::find($id)->kons()->get();
        return view('admin-pages.crud-kontak.tampilKontak', compact('kons'), [
            'title' => 'Page Kontak'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kons=kontak::find($id);
        $jk = jenis_kontak::all();

        return view('admin-pages.crud-kontak.editKontak', compact('kons', 'jk'), [
            'title' => 'Edit Kontak'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message=[
            'required' => 'form ini harus diisi!!',
            'min' => ':attribute minimal :min karakter!!',
        ];

        $this->validate($request, [
            'deskripsi' => 'required|min:3'
        ], $message);

        $kontak=kontak::find($id);
        $kontak->jenis_kontak_id = $request -> jenis_kontak_id;
        $kontak->deskripsi = $request -> deskripsi;
        $kontak->save();

        Session::flash('message', 'Kontak Berhasil diedit..');
        return redirect('/master-kontak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=kontak::find($id);
        $delete->delete();
        Session::flash('message', 'Kontak Berhasil dihapus..');
        return redirect('/master-kontak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        $jkk=jenis_kontak::where('id',$id)->firstOrFail();
        $jkk->delete();
        Session::flash('message', 'Jenis Kontak Telah dihapus..');
        return redirect('/master-kontak');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah(Request $request)
    {   
         $message=[
            'required' => 'form ini harus diisi!!',
        ];

        $this->validate($request, [
            'jenis_kontak' => 'required'
        ], $message);

        jenis_kontak::create([
            'jenis_kontak' => $request -> jenis_kontak,
        ]);

        Session::flash('message', 'Jenis Kontak Baru telah ditambahkan..');
        return redirect('/master-kontak');
    }
}
