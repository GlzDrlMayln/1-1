<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

    
class StudentController extends Controller
{
    //Api Functions
    public function index() {
        $students = Student::with('countries','academics')->get();
        return response()->json(['students' => $students]);
    }
    public function store(Request $request) {
        $students = Student::create($request->all());
        $students -> countries()->create($request->input('countries'));
        $students -> academics()->create($request->input('academics'));
        return response()->json(['message' => "Succesfully created a student."]);
    }

    public function update(Request $request, $id) {
        $students = Student::find($id);
        $students -> update($request->all());
        $students -> countries()->update($request->input('countries'));
        $students -> academics()->update($request->input('academics'));
        return response()->json(['students'=> $students]);
    }

    public function destroy($id) {
        $students = Student::find($id);
        $students -> countries()->delete();
        $students -> academics()->delete();
        $students -> delete();
        return response()->json(['message' => "Succesfully deleted the user."]);
    }

    //Web Functions
    public function indexStudent()
    {
        $students = Student::with(['countries','academics'])->get();
        return view('crud.indexStudent', compact('students'));
    }

    public function storestudent(Request $request)
    {
        $newstudent = $request->validate([
            'name' => 'required|max:255|string',
            'age' => 'required|max:255|int',
            'address' => 'required|max:255|string',
        ]);

        $newcountry = $request->validate([
            'continent' => 'required|max:255|string',
            'country_name' => 'required|max:255|string',
            'capital' => 'required|max:255|string',
        ]);

        $newacademic = $request->validate([
            'course' => 'required|max:255|string',
            'year' => 'required|max:255|string',
        ]);

        $createstudent = Student::create($newstudent);
        $createstudent -> academics()->create($newacademic);
        $createstudent -> countries()->create($newcountry);

        return redirect('crudStudent/createStudent')->with('status','success');
    }

    public function createStudent(Request $request)
    {
        
        return view('crud.createStudent');
        
    }
    
    public function edit(Student $student)
    {
        return view('crud.editStudent',['student' => $student]);
    }

    public function updatestudent(Request $request, Student $student)
    {
        $currentstudent = $request->validate([
            'name' => 'required|max:255|string',
            'age' => 'required|max:255|int',
            'address' => 'required|max:255|string',
        ]);

        $currentcountry = $request->validate([
            'continent' => 'required|max:255|string',
            'country_name' => 'required|max:255|string',
            'capital' => 'required|max:255|string',
        ]);

        $currentacademic = $request->validate([
            'course' => 'required|max:255|string',
            'year' => 'required|max:255|string',
        ]);

        $student -> update($currentstudent);
        $student -> academics() -> update($currentacademic);
        $student -> countries() -> update($currentcountry);

        return redirect()->back()->with('status','success');
    }
    public function destroystudent($id)
    {
        $crud = Student::findOrFail($id);
        $crud ->delete();

        return redirect()->back()->with('status','deleted');
    }

}



