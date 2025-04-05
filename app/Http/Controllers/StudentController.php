<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\College;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $colleges = College::all();

        $students = Student::query();

        
        if ($request->has('college_id') && $request->college_id != '') {
            $students->where('college_id', $request->college_id);
        }

        
        if ($request->has('sort') && $request->sort === 'name') {
            $students->orderBy('name');
        }

        $students = $students->get();

        return view('students.index', compact('students', 'colleges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colleges = College::all();
        return view('students.create', compact('colleges'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required',
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student added successfully!');

    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        $colleges = College::all();
        return view('students.edit', compact('student', 'colleges'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'required',
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::destroy($id);
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
