<?php

namespace App\Http\Controllers;


use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    //index 
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    //this is create a new student
    public function create()
    {
        return view('students.create');
    }


    public function store(Request $request)
    {
     
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'password' => 'required|min:6',
            'contact' =>  'required|min:10|unique:students',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]); 
        // print _r is using for a showing data in browser
        // print_r($request->all());
        // $request->validate([
            // 'name' => 'required',
            // 'email' => 'required|email|unique:users',
            // 'password' => 'required|min:6',
            // 'contact' =>  'required|min:10',
            // 'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        // ]);

        $student = new Student();

        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = $request->password;
        $student->contact = $request->contact;






        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('students', 'public');

            $student->image = $imagePath;
            //$student->save();

        }
        $student->save();
        //Student::create($request->post());

        return redirect()->route('students.index')->with('success', 'Form submitted successfully.');
    }




    public function edit(Request $request, $id)

    {
        $student = Student::find($id);

        return view('students.edit', compact('student'));
    }




    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
             'contact' => 'required',
             'image' => 'required',
        ]);
    
        $student = Student::find($id);
        $student->fill($request->post())->save();
        return redirect()->route('students.index')->with('success', 'Student has been updated successfully');
    }
    

    public function destroy($id)

    {

        $student = Student::findOrFail($id);

        $student->delete();

        return redirect()->route('students.index')

            ->with('success', 'studets updated successfully');
    }
}
