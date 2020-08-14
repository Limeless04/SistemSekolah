<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\TeachersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Teacher;
use Session;
use DataTables;

class HeadmasterController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return view('kepsek.index');
    }

    public function jsonGuru()
    {
        $data = Teacher::where('npsn', Auth::user()->npsn);
        return Datatables::of($data)->addColumn('aksi', function($data){
            $aksi = '<a href="/kepsek/update/'.$data->id.'" class="badge badge-info">Edit</a> <a href="/kepsek/delete/'.$data->id.'"class="badge badge-danger">Hapus</a>';
            return $aksi;
        })->rawColumns(['aksi'])->make(true);
    }
    public function jsonSiswa()
    {
        $data = Student::where('npsn',Auth::user()->npsn);
        return Datatables::of($data)->make(true);
    }

    public function teachersList(){
        return view('kepsek.teachers');
    }

    public function showImportTeacherForm(){
        return view('kepsek.import_teacher');
    }

    public function import_excel(Request $request){
        // validasi
        $request->validate([
            'file_guru' => 'required|mimes:csv,xls,xlsx'
        ]);
 
		// menangkap file excel
		$file = $request->file('file_guru');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_guru',$nama_file);
 
		// import data
		Excel::import(new TeachersImport, public_path('/file_guru/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Guru Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/kepsek/data_guru');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
