<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colleges = College::all();//fetching all available colleges 
        return view('colleges.index', compact('colleges'));//returns the index view with the list of colleges
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('colleges.create');//shows the form to create a college
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //to validate the requested data and creates a new college
        $request->validate([
            'name' => 'required|unique:colleges,name',
            'address' => 'required',
        ], [
            'name.required' => 'The college name is required.',
            'name.unique' => 'The college name must be unique.',
            'address.required' => 'The college address is required.',
        ]);

        College::create($request->all());

        return redirect()->route('colleges.index')->with('success', 'College was added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //to show the details of a college
        $college = College::findOrFail($id);
        return view('colleges.show', compact('college'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    //to show the form to edit a college
    {
        $college = College::findOrFail($id);
        return view('colleges.edit', compact('college'));//returns the edit form 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validate the new drequested data from the edit form and updates it
        $college = College::findOrFail($id);
        
        $request->validate([
            'name' => 'required|unique:colleges,name,'.$id,
            'address' => 'required',
        ], [
            'name.required' => 'The college name is required.',
            'name.unique' => 'The college name must be unique.',
            'address.required' => 'The college address is required.',
        ]);

        $college->update($request->all());

        return redirect()->route('colleges.index')->with('updated', 'College updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $college = College::findOrFail($id);
        $college->delete();//deletes permanately the college 

        return redirect()->route('colleges.index')->with('deleted', 'College deleted successfully.');
    }
}