<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\TeachersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Teacher;
use Session;
use DataTables;
class StudentController extends Controller
{
    public function index(){
        return view('student.index');
    }
}
