<?php

namespace App\Http\Controllers;
// use Session;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class SiswaController extends Controller
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
        // DB siswa
        $siswa = DB::table('siswa')->get();
        $no = 1;

        return view('admin-pages.master-siswa', [
            'title' => 'Master Siswa',
            'siswa' => $siswa,
            'n' => $no
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-pages.crud-siswa.tambahSiswa', [
            'title' => 'Tambah Siswa'
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
            'max' => ':attribute maksimal :max karakter!!',
            'numeric' => ':attribute harus berupa angka!!',
            'mimes' => ':attribute harus berupa gambar!!',
        ];

        $this->validate($request, [
            'nama' => 'required|max:100',
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg|max:5000',
            'about' => 'required|min:10'
        ], $message);

        $file = $request->file('foto');

        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);

        siswa::create([
            'nama' => $request -> nama,
            'nisn' => $request -> nisn,
            'alamat' => $request -> alamat,
            'jk' => $request -> jk,
            'foto' => $nama_file,
            'about' => $request -> about
        ]);

        Session::flash('message', 'Data Berhasil ditambahkan..');
        return redirect('/master-siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa=siswa::find($id);
        $kontaks=$siswa->kontak()->get();
        return view('admin-pages.crud-siswa.tampilSiswa', compact('siswa', 'kontaks'), [
            'title' => 'Profil Siswa'
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
        $siswa=siswa::find($id);
        return view('admin-pages.crud-siswa.editSiswa', compact('siswa'), [
            'title' => 'Edit Siswa'
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
            'required' => ':attribute harus diisi!!',
            'min' => ':attribute minimal :min karakter!!',
            'max' => ':attribute maksimal :max karakter!!',
            'numeric' => ':attribute harus berupa angka!!',
        ];

        $this->validate($request, [
            'nama' => 'required|max:100',
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'about' => 'required|min:10'
        ], $message);

        if($request->foto != '') {

            $siswa=siswa::find($id);
            file::delete('./template/img/'.$siswa->foto);

            $file = $request->file('foto');

            $nama_file = time()."_".$file->getClientOriginalName();

            $tujuan_upload = './template/img';
            $file->move($tujuan_upload,$nama_file);

            $siswa->nama = $request-> nama;
            $siswa->nisn = $request -> nisn;
            $siswa->alamat = $request -> alamat;
            $siswa->jk = $request -> jk;
            $siswa->foto = $nama_file;
            $siswa->about = $request -> about;
            $siswa->save();
        } else {
            $siswa=siswa::find($id);
            $siswa->nama = $request-> nama;
            $siswa->nisn = $request -> nisn;
            $siswa->alamat = $request -> alamat;
            $siswa->jk = $request -> jk;
            $siswa->about = $request -> about;
            $siswa->save();
        }
        Session::flash('message', 'Data Berhasil diedit..');
        return redirect('/master-siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        $siswa=siswa::where('id',$id)->firstOrFail();
        $siswa->delete();
        Session::flash('message', 'Data Berhasil dihapus..');
        return redirect('/master-siswa');
    }

}
