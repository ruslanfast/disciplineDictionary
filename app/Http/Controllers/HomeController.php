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

        return view('admin.index', ['disciplines' => $disciplines]);
    }
}
