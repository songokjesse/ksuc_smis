<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\student;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentUsercontroller extends Controller
{
    public function newstu(){
return view('admin.students.landing');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'year'=>'Required',
            'adm'=>'Required',
            'email'=>'Required'
            ]);

            $searched=$request->input('email');
            $User= new User;
            $User->first_name = $request->input('firstname');
            $User->surname =$request->input('surname');
            $User->phone_number = $request->input('phone');
            $User->email =$searched ;
            $User->password = Hash::make($request->input('password'));
            $User->save();
        $theuser=User::where('email','LIKE','%'.$searched.'%')->value('id');
        $student= new Student;

        $student->user_id= $theuser;
        $student->admission_number=$request->input('adm');
        $student->year_admitted=$request->input('year');
        $student->save();
        return back()->with('status', 'Student added to the system!');

    }
}
