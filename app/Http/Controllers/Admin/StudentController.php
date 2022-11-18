<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student=Student::paginate('20');
        return view('admin.students.students')
        ->with('student' , $student)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.studentcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'year'=>'Required',
            'adm'=>'Required',
            'email'=>'Required'
            ]);
        $searched=$request->input('email');
        $theuser=User::where('email','LIKE','%'.$searched.'%')->value('id');
        $student= new Student;

        $student->user_id= $theuser;
        $student->admission_number=$request->input('adm');
        $student->year_admitted=$request->input('year');
        $student->save();
        return redirect('/admin/student')->with('status', 'Student added to the system!');
// $empty="Not found";
// $searched=$request->input('search');
//         $lantec=stock::where('product_name','LIKE','%'.$searched.'%')
//         ->paginate(24);
//         return view('layouts.search' ,['lantec'=>$lantec,'empty'=>$empty]);
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
        $student=Student::find($id)->first();
        return view('admin.students.studentedit')
        ->with('student',$student);
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
        $this->validate($request, [
            'year'=>'Required',
            'adm'=>'Required',
            ]);
         
            $student=Student::where('id',$id)
            ->update([

              
                'admission_number'=>$request->input('adm'),
                
                'year_admitted'=>$request->input('year'),
            ]);
            return redirect('/admin/student')->with('status', 'update Created Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student::find($id);
        $student->delete();
        return redirect('/admin/student')->with('status',__('Record deleted'));
    }
}
