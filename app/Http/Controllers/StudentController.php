<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'name' => 'required|min:5|unique:students,name',
            'roll' => 'required|numeric|min_digits:2|max_digits:3|unique:students,roll',
            'img' => 'required|mimes:png,jpg,jpeg,svg'
        ]);

        try {
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $name = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/', $name);
            }
            Student::create([
                'name' => $request->input('name'),
                'roll' => $request->input('roll'),
                'img' => 'uploads/' . $name,
            ]);
            Session::flash('type', 'success');
            Session::flash('message', 'Data created successful!!!');
            return redirect()->route('home');
        } catch (\Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
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
        $data = Student::findorfail($id);
        return view('frontend.edit', compact('data'));
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
        $request->validate([
            'name' => 'required|min:5|unique:students,name,' . $id,
            'roll' => 'required|numeric|min_digits:2|max_digits:3|unique:students,roll,' . $id,
        ]);

        try {

            $student = Student::find($id);
            $student->name = $request->input('name');
            $student->roll = $request->input('roll');
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $name = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/', $name);
                if (file_exists(public_path($student->img))) {
                    unlink($student->img);
                }
                $student->img = 'uploads/' . $name;
            }
            $student->update();
            Session::flash('type', 'success');
            Session::flash('message', 'Data update successful!!!');
            return redirect()->back();
        } catch (\Exception $error) {
            Session::flash('type', 'error');
            Session::flash('message', $error->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if (file_exists(public_path($student->img))) {
            unlink($student->img);
        }
        $student->delete();
        Session::flash('type', 'success');
        Session::flash('message', 'Data delete successful!!!');
        return redirect()->back();
    }
}
