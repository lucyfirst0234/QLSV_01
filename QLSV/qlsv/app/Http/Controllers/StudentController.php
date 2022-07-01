<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\StudentModel;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = StudentModel::all();
        return view('student.index',['students'=> $students]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = ClassModel::all();
        return view ('student.new', ['classes'=> $classes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['fullname'=>'required|max:30',
                    'email'=> 'required|email',
                    'username'=> 'required|min:4|max:30'
                ];
                $validator = Validator::make($request->all(),$rules);
                if($validator->fails())
                return redirect()->route('student.create')->withErrors($validator)->withInput();
                else{
                    $student = new StudentModel;
                    $student->fullname = $request->fullname;
                    $student->DOB = $request->DOB;
                    $student->sex = $request->sex;
                    $student->address = $request->address;
                    $student->hometown = $request->hometown;
                    $student->email = $request->email;
                    $student->facebook = $request->facebook;
                    
                    $hobby=0;
                    if(is_array($request->hobbies))
                        foreach($request->hobbies as $h)
                            $hobby += $h;
                    $student->hobbies = $hobby;
                    
                    $student->class_id = $request->class_id;
                    $student->username = $request->username;
                    $student->password = $request->password;    
                    $student->favourite_color = $request->favourite_color;
                    $student->description = $request->description;

                    $student->save();

                    $id = $student->id;

                    $file = $request -> avatar;

                    $file -> move("./uploads/", "$id.jpg");
                    
                    return redirect()->route('student.index');
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
        $student = StudentModel::findOrFail($id);
        $classes = ClassModel::all();
        return view ('student.edit', ['student'=> $student, 'classes'=>$classes]);
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
        $rules = ['fullname'=>'required|max:30',
                    'email'=> 'required|email',
                    'username'=> 'required|min:4|max:30'
                ];
                $validator = Validator::make($request->all(),$rules);
                if($validator->fails())
                return redirect()->route('student.create')->withErrors($validator)->withInput();
                else{
                    $student = StudentModel::findOrFail($id);
                    $student->fullname = $request->fullname;
                    $student->DOB = $request->DOB;
                    $student->sex = $request->sex;
                    $student->address = $request->address;
                    $student->hometown = $request->hometown;
                    $student->email = $request->email;
                    $student->facebook = $request->facebook;
                    
                    $hobby=0;
                    if(is_array($request->hobbies))
                        foreach($request->hobbies as $h)
                            $hobby += $h;
                    $student->hobbies = $hobby;
                    
                    $student->class_id = $request->class_id;
                    $student->username = $request->username;
                    $student->password = $request->password;    
                    $student->favourite_color = $request->favourite_color;
                    $student->description = $request->description;

                    $student->save();
                    $id = $student->id;

                    $file = $request -> avatar;

                    $file -> move("./uploads/", "$id.jpg");
            
                    return redirect()->route('student.index');
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
        $student = StudentModel::findOrFail($id);
        $student -> delete();

        if(file_exists("./uploads/{$student->id}.jpg"))
            unlink("./uploads/{$student->id}.jpg");
        return redirect()->route('studenindext.');    
    }
}
