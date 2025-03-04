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
        $colleges = College::all();
        return view('colleges.index', compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('colleges.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        $college = College::findOrFail($id);
        return view('colleges.show', compact('college'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $college = College::findOrFail($id);
        return view('colleges.edit', compact('college'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
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
        $college->delete();

        return redirect()->route('colleges.index')->with('deleted', 'College deleted successfully.');
    }
}