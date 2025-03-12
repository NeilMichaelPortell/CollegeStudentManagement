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
        $collegeId = $request->input('college_id'); // Get the selected college ID for the filter
        $sortOrder = $request->input('sort_order', 'asc'); // Sorting by name in ascending order by default

        $query = Student::query(); // Initialize query builder for students

        // If a college is selected, filter students by that college
        if ($collegeId) {
            $query->where('college_id', $collegeId);
        }

        // Apply sorting by name and sorting order
        $students = $query->orderBy('name', $sortOrder)->orderBy('id', 'asc')->get();

        $colleges = College::all(); // Get all colleges to display in the filter dropdown
        return view('students.index', compact('students', 'colleges', 'sortOrder', 'collegeId'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //creates a new student
        $colleges = College::all();
        return view('students.create', compact('colleges'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        //validates the requestesd data and creates a new student
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',//6.Validation and Alerts
            'phone' => 'required|regex:/^[0-9]{8}$/',//6.Validation and Alerts
            'dob' => 'required|date',//6.Validation and Alerts
            'college_id' => 'required|exists:colleges,id',//6.Validation and Alerts
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student was added successfully');//6.Validation and Alerts
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //shows the form to edit a student
        $student = Student::findOrFail($id);
        $colleges = College::all();
        return view('students.edit', compact('student', 'colleges'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validates the requested data from the edit form and updates it
        $student = Student::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,'.$id,
            'phone' => 'required|regex:/^[0-9]{8}$/', //shows a different error message pop up if the phone number is not 8 digits long
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('updated', 'Student updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //deletes a student
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('deleted', 'Student deleted successfully.');
    }

}
