<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $schools = School::paginate(10);
        return view('admin.schools.index', compact('schools'));
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
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
        ]);

        School::create($request->all());
        return redirect()->route('schools.index')
            ->with('status','School created successfully.');
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
     * @param School $school
     * @return Application|Factory|View
     */
    public function edit(School $school): View|Factory|Application
    {
        return view('admin.schools.edit',compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, School $school)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $school->update($request->all());

        return redirect()->route('schools.index')
            ->with('status','School updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param School $school
     * @return RedirectResponse
     */
    public function destroy(School $school): RedirectResponse
    {
        $school->delete();

        return redirect()->route('schools.index')

            ->with('status','School deleted successfully');
    }
}
