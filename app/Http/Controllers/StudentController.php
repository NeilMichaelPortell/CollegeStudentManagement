<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\College;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $collegeId = $request->input('college_id'); //get the selected college ID for the filter
        
        $sortOrder = $request->input('sort_order');//sorting by ID as default
      
        $query = Student::query();// Initialize query builder for students


        //if a college is selected, filter students by that college
        if ($collegeId) {
            $students = Student::where('college_id', $collegeId)->get();
        } else {
           //no college in filter then show all students
            $students = Student::all();
        }

        //applying soring by name and sorting the order 
        if ($sortOrder) {
            $students = $query->orderBy('name', $sortOrder)->orderBy('id', 'asc')->get();
        } else { //sort by id
            $students = $query->orderBy('id')->get();
        }

        $colleges = College::all(); // Get all colleges to display in the filter dropdown
        return view('students.index', compact('students', 'colleges', 'sortOrder'));
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
            'email' => 'required|email|unique:students,email',//6.Validation and Alerts
            'phone' => 'required|regex:/^[0-9]{8}$/',//6.Validation and Alerts
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student was added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
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
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,'.$id,
        'college_id' => 'required|exists:colleges,id',
    ]);

    $student->update([
        'name' => $request->name,
        'email' => $request->email,
        'college_id' => $request->college_id,
    ]);

    return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect()->route('students.index')->with('success', 'Student deleted successfully');
}

}
