<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        $data = Student::all();
        return view('frontend.home',compact('data'));
    }

    public function create()
    {
        return view('frontend.create');
    }
}
