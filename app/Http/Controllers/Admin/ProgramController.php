<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\School;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $programs = Program::paginate(10);
        return view('admin.programs.index', compact('programs'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $schools = School::all();
        return view('admin.programs.create', compact('schools'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'school_id' => 'required',
        ]);

        Program::create($request->all());
        return redirect()->route('programs.index')
            ->with('status','Program created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $program = Program::find($id);
        $schools = School::all();
        return view('admin.programs.edit', compact('schools', 'program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required',
            'school_id' => 'required',
        ]);

        $program->update($request->all());
        return redirect()->route('programs.index')
            ->with('status','Program Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('programs.index')

            ->with('status','Program deleted successfully');
    }
}
