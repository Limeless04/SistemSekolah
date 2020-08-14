<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\StudentsImport;
use App\Imports\QuestImport;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use App\Student;
use App\Mapel;
use App\Task;
use App\Attendance;
use App\Vidcall;
use App\Quest;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guru.index');
    }

    public function check()
    {
        return view('guru.check');
    }

    public function jsonSiswa()
    {
        $data = Student::where('npsn',Auth::user()->npsn);
        return Datatables::of($data)->addColumn('aksi', function($data){
            $aksi = '<a href="/guru/updateSiswaId/'.$data->id.'" class="badge badge-info">Edit</a> <a href="/guru/deleteSiswaId/'.$data->id.'"class="badge badge-danger">Hapus</a>';
            return $aksi;
        })->rawColumns(['aksi'])->make(true);
    }
    
        public function listStudents(){
            return view('guru.students');
        }
        public function showStudentsImportForm(){
            return view('guru.import_siswa');
        }
      public function import_excel(Request $request){
                        // validasi
                        $request->validate([
                            'file_siswa' => 'required|mimes:csv,xls,xlsx'
                        ]);
                 
                        // menangkap file excel
                        $file = $request->file('file_siswa');
                 
                        // membuat nama file unik
                        $nama_file = rand().$file->getClientOriginalName();
                 
                        // upload ke folder file_siswa di dalam folder public
                        $file->move('file_siswa',$nama_file);
                 
                        // import data
                        Excel::import(new StudentsImport, public_path('/file_siswa/'.$nama_file));
                 
                        // notifikasi dengan session
                        Session::flash('sukses','Data Siswa Berhasil Diimport!');
                 
                        // alihkan halaman kembali
                        return redirect('/guru/dataSiswa');
                    }
    
    public function questBank(){
        return view('guru.questBank');
    }

    public function jsonQuest()
    {
        $data = Quest::all();
        return Datatables::of($data)->addColumn('aksi', function($data){
            $aksi = '<a href="/guru/updateSoal/'.$data->id.'" class="badge badge-info">Edit</a> <a href="/guru/deleteSoal/'.$data->id.'"class="badge badge-danger">Hapus</a>';
            return $aksi;
        })->rawColumns(['aksi'])->make(true);
    }

    public function showTeacherImportForm(){
        return view('guru.import_soal');
    }

    public function import_soal_excel(Request $request){
        // validasi
        $request->validate([
            'file_soal' => 'required|mimes:csv,xls,xlsx'
        ]);
 
        // menangkap file excel
        $file = $request->file('file_soal');
 
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('file_soal',$nama_file);
 
        // import data
        Excel::import(new QuestImport, public_path('/file_soal/'.$nama_file));
 
        // notifikasi dengan session
        Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
        // alihkan halaman kembali
        return redirect('/guru/questBank');
    }

    public function belajar()
    {
        $kelas = Student::select('kelas')->get();
        $mapel = Mapel::select('mapel')->get();
        return view('guru.belajar',compact('kelas','mapel'));

    }

    public function postBelajar(Request $request)
    {

        $validatedData = $request->validate([
            'pilih_kelas' =>'required',
            'pilih_pelajaran' => 'required',
            'kegiatan'=>'required',
        ]);
        $task = Session::put('sesiBelajar',$validatedData);
        if($request->kegiatan == 'zoom'){
            return redirect('/guru/absensi');
        }elseif($request->kegiatan == "tugas"){
            return redirect('/guru/task');
        }elseif($request->kegiatan == "quiz"){
            return redirect('/guru/quiz');
        }
    }


    public function absensi(){
        $task = Session::get('sesiBelajar');
        $student = Student::where('kelas',$task['pilih_kelas'])->get();
        return view('guru.absensi',compact('task','student'));
    }

    public function postAbsensi(Request $request){
       $request->validate([
            'materi'=>'required',
            'id_siswa'=>'required',
            'nama_siswa'=>'required',
            'kelas_siswa'=>'required',
            'ketHadirRadio'=>'required',
        ]);
        // $vidcall = new Vidcall();
        // $vidcall->mapel = $request->mapel;
        // $vidcall->materi = $request->materi;
        // $vidcall->kelas = $request->kelas;
        Vidcall::create([
            'mapel' =>$request->mapel,
            'materi'=>$request->materi,
            'kelas'=>$request->kelas,
        ]);

        // $attendance = new Attendance();
        // $attendance->id_siswa = $request->id_siswa;
        // $attendance->nama_siswa = $request->nama_siswa;
        // $attendance->kelas_siswa = $request->kelas_siswa;
        // $attendance->status = $request->ketHadirRadio;
        Attendance::create([
            'id_siswa'=>$request->id_siswa,
            'nama_siswa'=>$request->nama_siswa,
            'kelas_siswa'=>$request->kelas_siswa,
            'status'=>$request->ketHadirRadio,
        ]);
        return redirect('/guru/belajar')->with('status','Aktifitas Pembelajaran Ditambahkan!');
    }

    public function task(){
        $task = Session::get('sesiBelajar');
        $student = Student::where('kelas',$task['pilih_kelas'])->get();
        return view('guru.tugas',compact('task','student'));
    }


    public function postTask(Request $request){
        $request->validate([
            'materi'=>'required',
            'kumpul'=>'required',
            'keterangan'=>'required',
        ]);
        Task::create([
            'mapel'=>$request->mapel,
            'kelas'=>$request->kelas,
            'materi'=>$request->materi,
            'tgl_kumpul'=>$request->kumpul,
            'keterangan'=>$request->keterangan,
        ]);
        return redirect('/guru/belajar')->with('status','Aktifitas Pembelajaran Ditambahkan!');
    }


    public function quiz(){
        $quiz = Session::get('sesiBelajar');
        $questions = Quest::all();
        return view('guru.quiz',compact('quiz','questions'));
    }

    public function postQuiz(){
        
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
