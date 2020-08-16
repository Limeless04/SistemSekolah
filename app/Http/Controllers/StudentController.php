<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\TeachersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Teacher;
use App\Task;
use App\Quiz;
use Session;
use DataTables;
class StudentController extends Controller
{
    public function index(){
        return view('student.index');
    }

    public function check(){
        return view('student.check');
    }

    public function jsonTugas(){
        $kelas = Auth::user()->kelas;
        $data = Task::where('kelas',$kelas)->get();
        return Datatables::of($data)->addColumn('aksi', function($data){
            $aksi = '<a href="/siswa/submit/" class="badge badge-success">Kumpulkan</a>';
            return $aksi;
        })->editColumn('tgl_kumpul',function($data){
            return date('d-m-Y',strtotime($data->tgl_kumpul));
        })->rawColumns(['aksi'])->make(true);
    }
    public function jsonQuiz(){
        $kelas = Auth::user()->kelas;
        $data = Quiz::where('kelas',$kelas)->get();
        return Datatables::of($data)->addColumn('aksi', function($data){
            $aksi = '<a href="/siswa/kerjakan/" class="badge badge-primary">Kerjakan</a>';
            return $aksi;
        })->editColumn('quiz_date',function($data){
            return date('d-m-Y',strtotime($data->quiz_date));
        })->rawColumns(['aksi'])->make(true);
    }
}
