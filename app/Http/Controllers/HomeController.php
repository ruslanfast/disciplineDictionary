<?php

namespace disciplineDictionary\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplines = DB::table('disciplines')
                         ->join('departments', 'disciplines.department_id', '=', 'departments.id')
                         ->select('disciplines.id', 'disciplines.name', 'disciplines.academic_time', 'departments.name as depart_name')
                         ->get();

        $faculties = DB::table('faculties')->get();

        $departments = DB::table('departments')
                         ->join('faculties', 'departments.faculty_id', '=', 'faculties.id')
                         ->select('departments.id', 'departments.name', 'faculties.name as faculty_name', 'departments.faculty_id')
                         ->get();

        return view('admin.index', ['disciplines' => $disciplines, 'faculties' => $faculties, 'departments' => $departments]);
    }
}
