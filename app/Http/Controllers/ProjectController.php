<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
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
        $siswa = siswa::paginate(7);
        return view('admin-pages.master-project', compact('siswa'), [
            'title' => 'Master Project',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        // $siswa=siswa::find($id);
        // return view('admin-pages.crud-project.tambahProject', compact('siswa'), [
        //     'title' => 'Tambah Project'
        // ]);
    }

     public function tambah($id)
    {   
        $siswa=siswa::find($id);
        return view('admin-pages.crud-project.tambahProject', compact('siswa'), [
            'title' => 'Tambah Project'
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
        ];

        $this->validate($request, [
            'nama_projek' => 'required|max:25|min:3',
            'deskripsi' => 'required|min:3'
        ], $message);

        project::create([
            'siswa_id' => $request -> siswa_id,
            'nama_projek' => $request -> nama_projek,
            'deskripsi' => $request -> deskripsi,
            'tanggal' => date('Y-m-d')
        ]);

        Session::flash('message', 'Project Berhasil ditambahkan..');
        return redirect('/master-project');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project=siswa::find($id)->project()->get();
        return view ('admin-pages.crud-project.tampilProject', compact('project'), [
            'title' => 'Project ID'
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
        $projek=project::find($id);

        return view('admin-pages.crud-project.editProject', compact('projek'), [
            'title' => 'Edit Project'
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
            'max' => ':attribute maksimal :max karakter!!',
        ];

        $this->validate($request, [
            'nama_projek' => 'required|max:25|min:3',
            'deskripsi' => 'required|min:3'
        ], $message);

        $projses=project::find($id);
        $projses->nama_projek = $request -> nama_projek;
        $projses->deskripsi = $request -> deskripsi;
        $projses->save();

        Session::flash('message', 'Data Berhasil diedit..');
        return redirect('/master-project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $delete=project::find($id);
        $delete->delete();
        Session::flash('message', 'Data Berhasil dihapus..');
        return redirect('/master-project');
    }
}
